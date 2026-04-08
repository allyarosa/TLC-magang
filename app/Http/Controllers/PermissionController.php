<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function index()
    {
        return view('permission');
    }

    public function store(Request $request)
    {
        $permission = $request->input('permission');
        $action = $request->input('action', 'assign'); // Default to assign
        $user = Auth::user();

        if ($action === 'revoke') {
            if ($user->hasPermissionTo($permission)) {
                $user->revokePermissionTo($permission);
                return back()->with('success', "Permission '$permission' dicabut.");
            } else {
                return back()->with('info', "User tidak memiliki permission '$permission'.");
            }
        } else {
            if (!$user->hasPermissionTo($permission)) {
                $user->givePermissionTo($permission);
                return back()->with('success', "Permission '$permission' diberikan.");
            } else {
                return back()->with('info', "User sudah memiliki permission '$permission'.");
            }
        }
    }

    public function dicoding(string $id) {
        
    }
}
