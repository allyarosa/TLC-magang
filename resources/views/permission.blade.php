@php
    $permissions = [
        'fresh_user',
        'access_level_B_unpaid',
        'access_level_C_unpaid',
        'level_a_pending_payment',
        'level_b_pending_payment',
        'level_c_pending_payment',

        'access_level_A',
        'access_level_B',
        'access_level_C',

        'level_A_completed',
        'level_B_completed',
        'level_C_completed',
        'bundling',
        'EXPIRED_LEVEL',

        'HOTS',
        'PCK',
        'NUMERASI',
        'LITERASI',
        'PPT_UPLOAD',
        'ESSAY',
        'VIDEO_UPLOAD',
        'YES_NO_QUESTIONS',
        'EXPIRED_KATEGORY',
        'MODUL_AJAR'
    ];
@endphp

@if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <h5>Akses User Saat ini : 
        <span>{{ Auth::user()->getPermissionNames() }}</span>
    </h5>

    @foreach ($permissions as $permission)
        <form method="POST" action="{{ route('assign.permission') }}">
            @csrf
            <input type="hidden" name="permission" value="{{ $permission }}">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition-all duration-200">
                Beri Akses: {{ strtoupper($permission) }}
            </button>
        </form>
    @endforeach
</div>
