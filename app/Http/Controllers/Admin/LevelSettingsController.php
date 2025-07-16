<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelSettingsController extends Controller
{
    public function index()
    {
        $levels = Level::latest()->paginate(10);
        return view('admin.level.settings.index', [
            'levels' => $levels,
        ]);
    }
}
