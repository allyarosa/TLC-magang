<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(route('asesi.dashboard'))
            : view('auth.verify-email');
    }

    /**
     * Verify email — works even if user is not logged in (different browser/session).
     * Auto-login user using the ID in the signed URL, validate hash, then redirect to dashboard.
     */
    public function verify(Request $request, $id, $hash)
    {
        // Find the user by ID from URL
        $user = User::findOrFail($id);

        // Validate the hash
        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403, 'Link verifikasi tidak valid.');
        }

        // If already verified, just login and redirect
        if ($user->hasVerifiedEmail()) {
            Auth::login($user);
            return redirect()->route('asesi.dashboard')->with('alert_verified', 'already');
        }

        // Mark email as verified
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // Auto-login user (regardless of which browser clicked the link)
        Auth::login($user);

        return redirect()->route('asesi.dashboard')->with('alert_verified', 'success');
    }

    public function send(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('asesi.dashboard'));
        }

        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Link verifikasi baru telah dikirim ke email Anda.');
    }
}
