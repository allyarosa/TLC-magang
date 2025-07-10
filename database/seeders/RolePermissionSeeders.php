<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeders extends Seeder
{
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $asesi = Role::firstOrCreate(['name' => 'asesi']);
        $asesor = Role::firstOrCreate(['name' => 'asesor']);

        $permission_levels = [
            'fresh_user',
            'access_level_B_unpaid',
            'access_level_C_unpaid',
            'level_a_pending_payment',
            'level_b_pending_payment',
            'level_c_pending_payment',

            // MENGAKSES LEVEL 
            'access_level_A',
            'access_level_B',
            'access_level_C',

            // JIKA LEVEL SELESAI DIKERJAKAN
            'level_A_completed',
            'level_B_completed',
            'level_C_completed',
            'bundling',
            'EXPIRED_LEVEL',
        ];

        foreach($permission_levels as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        $permission_kategories = [
            'HOTS',
            'PCK',
            'NUMERASI',
            'LITERASI',

            'PPT_UPLOAD',
            'PPT_COMPLETED',

            'MODUL_AJAR',
            'MODUL_AJAR_COMPLETED',

            'ESSAY',
            'ESSAY_COMPLETED',

            'VIDEO_UPLOAD',
            'VIDEO_UPLOAD_COMPLETED',

            'YES_NO_QUESTIONS',
            'EXPIRED_KATEGORY',
        ];

        foreach($permission_kategories as $permission_k) {
            Permission::firstOrCreate([
                'name' => $permission_k,
                'guard_name' => 'web'
            ]);
        }

        $asesi->givePermissionTo('fresh_user');
    }
}