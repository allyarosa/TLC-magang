<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission Management</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans text-gray-900 antialiased">
    @php
        $groupedPermissions = [
            'Status Pengguna' => [
                'fresh_user',
            ],
            'Pending Pembayaran' => [
                'level_a_pending_payment',
                'level_b_pending_payment',
                'level_c_pending_payment',
            ],
            'Akses Belum Bayar' => [
                'access_level_B_unpaid',
                'access_level_C_unpaid',
            ],
            'Akses Level Aktif' => [
                'access_level_A',
                'access_level_B',
                'access_level_C',
            ],
            'Level Selesai' => [
                'level_A_completed',
                'level_B_completed',
                'level_C_completed',
            ],
            'Akses Spesial' => [
                'bundling',
                'EXPIRED_LEVEL',
            ],

            // ── Level A — Kategori ──────────────────────────────────
            'Level A — Kategori Aktif' => [
                'HOTS',
                'PCK',
                'NUMERASI',
                'LITERASI',
            ],
            'Level A — Kategori Terkunci' => [
                'HOTS_LOCK',
                'PCK_LOCK',
                'NUMERASI_LOCK',
                'LITERASI_LOCK',
            ],

            // ── Level B — Kategori ──────────────────────────────────
            'Level B — Kategori' => [
                'PPT_UPLOAD',
                'PPT_COMPLETED',
                'MODUL_AJAR',
                'MODUL_AJAR_COMPLETED',
            ],

            // ── Level C — Kategori ──────────────────────────────────
            'Level C — Kategori' => [
                'ESSAY',
                'ESSAY_COMPLETED',
                'VIDEO_UPLOAD',
                'VIDEO_UPLOAD_COMPLETED',
                'YES_NO_QUESTIONS',
            ],

            'Expired Kategori' => [
                'EXPIRED_KATEGORY',
            ],
        ];

        $colorMap = [
            'Status Pengguna'              => ['bg' => 'bg-slate-100',   'text' => 'text-slate-600',   'icon' => 'text-slate-500'],
            'Pending Pembayaran'           => ['bg' => 'bg-yellow-50',   'text' => 'text-yellow-700',  'icon' => 'text-yellow-500'],
            'Akses Belum Bayar'            => ['bg' => 'bg-orange-50',   'text' => 'text-orange-700',  'icon' => 'text-orange-500'],
            'Akses Level Aktif'            => ['bg' => 'bg-blue-50',     'text' => 'text-blue-700',    'icon' => 'text-blue-500'],
            'Level Selesai'                => ['bg' => 'bg-green-50',    'text' => 'text-green-700',   'icon' => 'text-green-500'],
            'Akses Spesial'                => ['bg' => 'bg-purple-50',   'text' => 'text-purple-700',  'icon' => 'text-purple-500'],
            'Level A — Kategori Aktif'     => ['bg' => 'bg-cyan-50',     'text' => 'text-cyan-700',    'icon' => 'text-cyan-500'],
            'Level A — Kategori Terkunci'  => ['bg' => 'bg-rose-50',     'text' => 'text-rose-700',    'icon' => 'text-rose-500'],
            'Level B — Kategori'           => ['bg' => 'bg-teal-50',     'text' => 'text-teal-700',    'icon' => 'text-teal-500'],
            'Level C — Kategori'           => ['bg' => 'bg-indigo-50',   'text' => 'text-indigo-700',  'icon' => 'text-indigo-500'],
            'Expired Kategori'             => ['bg' => 'bg-red-50',      'text' => 'text-red-700',     'icon' => 'text-red-500'],
        ];
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        {{-- Back button --}}
        <div class="mb-6">
            <a href="{{ route('asesi.sertifikasi') }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        {{-- Header --}}
        <div class="mb-12 text-center">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Permission Management</h1>
            <p class="mt-3 text-lg text-gray-500">
                Kelola hak akses untuk <span class="font-semibold text-gray-800">{{ Auth::user()->name }}</span>
            </p>
            <div class="mt-2 inline-flex items-center px-3 py-1 rounded-full bg-gray-100 text-sm text-gray-600">
                {{ Auth::user()->email }}
            </div>
        </div>

        {{-- Alerts --}}
        @if (session('success'))
            <div class="mb-8 rounded-md bg-green-50 p-4 border border-green-200">
                <div class="flex">
                    <svg class="h-5 w-5 text-green-400 mr-3 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session('info'))
            <div class="mb-8 rounded-md bg-blue-50 p-4 border border-blue-200">
                <div class="flex">
                    <svg class="h-5 w-5 text-blue-400 mr-3 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-sm font-medium text-blue-800">{{ session('info') }}</p>
                </div>
            </div>
        @endif

        {{-- Permission Groups --}}
        <div class="space-y-14">
            @foreach ($groupedPermissions as $category => $perms)
                @php
                    $color = $colorMap[$category] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-600', 'icon' => 'text-gray-400'];
                @endphp
                <section>
                    {{-- Section heading --}}
                    <div class="flex items-center mb-5">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $color['bg'] }} {{ $color['text'] }}">
                            {{ $category }}
                        </span>
                        <span class="ml-3 px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500">
                            {{ count($perms) }}
                        </span>
                        <div class="ml-4 flex-grow border-t border-gray-200"></div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                        @foreach ($perms as $permission)
                            @php $hasPermission = Auth::user()->hasPermissionTo($permission); @endphp

                            <div class="group relative bg-white rounded-xl border
                                {{ $hasPermission ? 'border-green-200 shadow-green-50 ring-1 ring-green-100' : 'border-gray-200' }}
                                shadow-sm hover:shadow-md transition-all duration-200 flex flex-col">

                                <div class="p-5 flex-grow">
                                    {{-- Icon + Badge --}}
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="p-2 rounded-lg {{ $hasPermission ? $color['bg'].' '.$color['icon'] : 'bg-gray-50 text-gray-400' }}">
                                            @if (str_contains($permission, 'LOCK'))
                                                {{-- Lock icon --}}
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                            @elseif (str_contains($permission, 'completed') || str_contains($permission, 'COMPLETED'))
                                                {{-- Check-circle icon --}}
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            @elseif (str_contains($permission, 'EXPIRED'))
                                                {{-- X-circle icon --}}
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            @elseif (str_contains($permission, 'access') || str_contains($permission, 'level'))
                                                {{-- Shield icon --}}
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                            @else
                                                {{-- Key icon --}}
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                                </svg>
                                            @endif
                                        </div>

                                        @if ($hasPermission)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                                ✓ Aktif
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-500">
                                                Tidak aktif
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Permission label --}}
                                    <h3 class="text-sm font-semibold text-gray-900 mb-1 leading-snug">
                                        {{ ucwords(str_replace('_', ' ', strtolower($permission))) }}
                                    </h3>
                                    <p class="text-xs font-mono text-gray-400 truncate" title="{{ $permission }}">
                                        {{ $permission }}
                                    </p>
                                </div>

                                {{-- Action button --}}
                                <div class="px-5 pb-5 mt-auto">
                                    <form method="POST" action="{{ route('assign.permission') }}">
                                        @csrf
                                        <input type="hidden" name="permission" value="{{ $permission }}">

                                        @if ($hasPermission)
                                            <input type="hidden" name="action" value="revoke">
                                            <button type="submit"
                                                class="w-full inline-flex justify-center items-center px-4 py-2 border border-red-200 text-sm font-medium rounded-lg text-red-700 bg-red-50 hover:bg-red-100 transition-colors">
                                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Cabut Akses
                                            </button>
                                        @else
                                            <input type="hidden" name="action" value="assign">
                                            <button type="submit"
                                                class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gray-900 hover:bg-gray-700 transition-colors">
                                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                Berikan Akses
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach
        </div>

    </div>
</body>

</html>
