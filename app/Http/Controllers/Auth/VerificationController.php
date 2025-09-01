<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(route('asesi.dashboard'))
            : view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('asesi.dashboard') . '?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('asesi.dashboard') . '?verified=1')
            ->with('status', 'Email berhasil diverifikasi!');
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
