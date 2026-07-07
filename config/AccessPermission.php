<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Access Permissions Configuration
    |--------------------------------------------------------------------------
    |
    | File ini berisi daftar permission dan role-role yang memilikinya.
    | Karena diletakkan di dalam folder config, Laravel akan otomatis meload-nya
    | dan Anda dapat memanggilnya di mana saja menggunakan helper config().
    |
    */

    'roles' => [
        'superadmin' => [
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',
            'permission.manage',
        ],
        'admin' => [
            'user.view',
            'user.create',
            'user.edit',
        ],
        'user' => [
            'user.view',
        ],
    ],

    'permissions' => [
        'access_level_A',
        'HOTS',
        'LITERASI',
        'NUMERASI'
    ],
];
