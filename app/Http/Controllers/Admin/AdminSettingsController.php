<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\AdminSettingsUpdateRequest;

class AdminSettingsController extends Controller
{
    public function edit(Request $request)
    {
        $profile = $request->user();
        $profileId = $profile->id;

        $userAdmin = UserProfile::with('user', )
            ->where('user_id', $profileId)
            ->whereHas('user', function ($query) {
                $query->role('admin');
            })->first();

        return view('admin.settings.index', [
            'user' => $request->user(),
            'img' => $userAdmin,
            'title' => 'Admin Settings',
            'navTitle' => 'Admin Settings' // BELUM FIX
        ]);
    }

    public function update(AdminSettingsUpdateRequest $request)
    {
        try {
            $user = $request->user();
            $user->fill($request->validated());

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->save();

            Alert::success('Success', 'Your profile has been updated!');
            return redirect()->route('admin.settings.edit')->with('status', 'profile-updated');

        } catch (\Exception $e) {
            Log::error('Profile update failed', ['error' => $e->getMessage()]);
            Alert::error('Error', 'Something went wrong while updating your profile.');
            return back()->withInput();
        }
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        if (Hash::check($validated['password'], $request->user()->password)) {
            return back()->withErrors([
                'password' => 'Password baru tidak boleh sama dengan password lama.',
            ])->withInput();
        }

        try {
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);

            Alert::success('Success', 'Your password has been updated!');
            return back()->with('status', 'password-updated');

        } catch(\Exception $e) {

            Log::error('Password update failed', ['error' => $e->getMessage()]);
            Alert::error('Error', 'Something went wrong while updating your password.');
            return back()->withInput();
        }
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->delete();

        Alert::success('Success', 'Your account has been deleted!');
        return redirect()->route('login')->with('status', 'account-deleted');
    }
}
