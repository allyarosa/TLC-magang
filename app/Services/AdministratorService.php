<?php

namespace App\Services;

use App\Models\AdminsProfile;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdministratorService
{
    public function storeData($request)
    {
        try {
            DB::beginTransaction();
            $request->validated();
            // dd($request->all());

            $user = User::create([
                'name' => 'Administrator' . $request->email,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'last_seen_at' => now(),
                'email_verified_at' => now(),
                'status' => 'active'
            ]);
            // memberikan akses role administrator
            if (!$user->hasRole('administrator')) {
                $user->assignRole('administrator');
            }

            $profileImagePath = $request->file('profile_image')?->store('profile_images', 'public');

            AdminsProfile::create([
                'user_id' => $user->id,
                'profile_image' => $profileImagePath ?? 'blankProfile.png',
            ]);

            if ($request->input('permissions')) {
                $user->syncPermissions($request->permissions);
            }
            DB::commit();
            return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil ditambahkan.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating admin account: ' . $e->getMessage());
            return back()->with('error', 'Gagal menambahkan admin: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteAdminAccount(int $id)
    {
        try {
            DB::beginTransaction();
            $admin = User::with('adminsProfile')->findOrFail($id);

            if ($admin->adminsProfile->profile_image && $admin->adminsProfile->profile_imagen !== 'blankProfile.png') {
                Storage::disk('public')->delete($admin->adminsProfile->profile_image);
            }

            $admin->adminsProfile()->delete();
            $admin->delete();

            DB::commit();
            return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil dihapus.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error deleting admin account: ' . $e->getMessage());
            return back()->with('error', 'Gagal menghapus admin: ' . $e->getMessage());
        }
    }

    public function showPageAdmin(int $id)
    {
        $admin = User::with('adminsProfile')->findOrFail($id);
        return view('admin.admins.show', compact('admin'));
    }

    public function updateAdminAccount($request, int $id)
    {
        try {
            DB::beginTransaction();
            $admin = AdminsProfile::with('user')->findOrFail($id);
            $request->validated();

            $admin->user->update([
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $admin->user->password,
            ]);

            if ($request->hasFile('profile_image')) {
                if ($admin->profile_image && $admin->profile_image !== 'blankProfile.png') {
                    Storage::disk('public')->delete($admin->profile_image);
                }

                $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
                $admin->update(['profile_image' => $profileImagePath]);
            }

            // Sync permissions
            if ($request->has('permissions')) {
                $admin->user->syncPermissions($request->permissions);
            } else {
                // Jika tidak ada yang dicentang, hapus semua permission admin tersebut
                $admin->user->syncPermissions([]);
            }
            DB::commit();

            return redirect()->route('admin.admins.index')->with('success', 'Admin berhasil diperbarui.');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui admin: ' . $e->getMessage())->withInput();
        }
    }

    public function showEditPage(int $id)
    {
        $admin = User::with('adminsProfile')->findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
    }
}