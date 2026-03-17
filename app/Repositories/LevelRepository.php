<?php
namespace App\Repositories;

use App\Models\Level;

class LevelRepository
{
    public function getLevels()
    {
        return Level::all();
    }
}