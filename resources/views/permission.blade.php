<!DOCTYPE html>
<html lang="en" class="scroll-pt-24 scroll-smooth focus:scroll-auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'TLC Direct Permission')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-abu font-sans">
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
            'MODUL_AJAR',
        ];

        // Grouping permissions by category
        $groupedPermissions = [
            'User Status' => ['fresh_user'],
            'Unpaid Access' => ['access_level_B_unpaid', 'access_level_C_unpaid'],
            'Pending Payment' => ['level_a_pending_payment', 'level_b_pending_payment', 'level_c_pending_payment'],
            'Active Access Levels' => ['access_level_A', 'access_level_B', 'access_level_C'],
            'Completed Levels' => ['level_A_completed', 'level_B_completed', 'level_C_completed'],
            'Special Access' => ['bundling', 'EXPIRED_LEVEL'],
            'Content Types' => [
                'HOTS',
                'PCK',
                'NUMERASI',
                'LITERASI',
                'PPT_UPLOAD',
                'ESSAY',
                'VIDEO_UPLOAD',
                'YES_NO_QUESTIONS',
                'EXPIRED_KATEGORY',
                'MODUL_AJAR',
            ],
        ];
    @endphp

    <!-- Success Alert -->
    @if (session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-sm animate-fade-in">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <p class="text-green-800 font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Header Card -->
    <div class="bg-gradient-to-r from-indigo-600 to-blue-600 rounded-xl shadow-lg p-6 mb-8">
        <div class="flex items-start justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white mb-2 flex items-center">
                    <svg class="w-7 h-7 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    Manajemen Permission User
                </h2>
                <p class="text-indigo-100 text-sm">Kelola akses dan permission untuk user</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                <p class="text-white text-sm font-medium">Total Permissions</p>
                <p class="text-3xl font-bold text-white">{{ count($permissions) }}</p>
            </div>
        </div>
    </div>

    <!-- Current User Permissions -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8 border border-gray-200">
        <div class="flex items-center mb-4">
            <div class="bg-indigo-100 rounded-full p-3 mr-4">
                <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Akses User Saat Ini</h3>
                <p class="text-sm text-gray-500">{{ Auth::user()->name ?? 'Current User' }}</p>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
            @php
                $userPermissions = Auth::user()->getPermissionNames();
            @endphp

            @if ($userPermissions->isEmpty())
                <div class="flex items-center text-gray-500">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm">Tidak ada permission yang diberikan</span>
                </div>
            @else
                <div class="flex flex-wrap gap-2">
                    @foreach ($userPermissions as $permission)
                        <span
                            class="inline-flex items-center px-3 py-1.5 bg-indigo-100 text-indigo-800 text-sm font-medium rounded-full">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $permission }}
                        </span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Permissions Grid by Category -->
    <div class="space-y-6">
        @foreach ($groupedPermissions as $category => $categoryPermissions)
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <!-- Category Header -->
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <span class="w-2 h-2 bg-indigo-600 rounded-full mr-3"></span>
                        {{ $category }}
                        <span class="ml-auto text-sm font-normal text-gray-500">{{ count($categoryPermissions) }}
                            permissions</span>
                    </h3>
                </div>

                <!-- Permissions Grid -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                        @foreach ($categoryPermissions as $permission)
                            @php
                                $hasPermission = Auth::user()->hasPermissionTo($permission);

                                // Define color schemes based on permission type
                                $colorScheme = 'blue';
                                if (str_contains($permission, 'pending')) {
                                    $colorScheme = 'yellow';
                                } elseif (str_contains($permission, 'unpaid')) {
                                    $colorScheme = 'orange';
                                } elseif (str_contains($permission, 'completed')) {
                                    $colorScheme = 'green';
                                } elseif (str_contains($permission, 'EXPIRED')) {
                                    $colorScheme = 'red';
                                } elseif (
                                    str_contains($permission, 'level_A') ||
                                    str_contains($permission, 'level_B') ||
                                    str_contains($permission, 'level_C')
                                ) {
                                    $colorScheme = 'purple';
                                }

                                $colorClasses = [
                                    'blue' => 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500',
                                    'yellow' => 'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500',
                                    'orange' => 'bg-orange-600 hover:bg-orange-700 focus:ring-orange-500',
                                    'green' => 'bg-green-600 hover:bg-green-700 focus:ring-green-500',
                                    'red' => 'bg-red-600 hover:bg-red-700 focus:ring-red-500',
                                    'purple' => 'bg-purple-600 hover:bg-purple-700 focus:ring-purple-500',
                                ];
                            @endphp

                            <form method="POST" action="{{ route('assign.permission') }}" class="relative group">
                                @csrf
                                <input type="hidden" name="permission" value="{{ $permission }}">

                                <button type="submit"
                                    class="w-full {{ $colorClasses[$colorScheme] }} text-white font-medium py-3 px-4 rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 relative overflow-hidden">

                                    <!-- Active indicator -->
                                    @if ($hasPermission)
                                        <span class="absolute top-2 right-2 flex h-3 w-3">
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
                                        </span>
                                    @endif

                                    <span class="flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            @if ($hasPermission)
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            @else
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 00-1 1v4a1 1 0 001 1h4a1 1 0 001-1V8a1 1 0 00-1-1H8z"
                                                    clip-rule="evenodd" />
                                            @endif
                                        </svg>
                                        <span
                                            class="text-sm truncate">{{ str_replace('_', ' ', strtoupper($permission)) }}</span>
                                    </span>

                                    <!-- Hover tooltip -->
                                    <span
                                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-1 bg-gray-900 text-white text-xs rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap pointer-events-none">
                                        @if ($hasPermission)
                                            Aktif - Klik untuk refresh
                                        @else
                                            Klik untuk memberikan akses
                                        @endif
                                    </span>
                                </button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Info Footer -->
    <div class="mt-8 bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd" />
            </svg>
            <div>
                <h4 class="text-sm font-semibold text-blue-800 mb-1">Informasi</h4>
                <ul class="text-sm text-blue-700 space-y-1">
                    <li>• Permission yang sudah aktif ditandai dengan indikator putih di pojok kanan atas</li>
                    <li>• Warna tombol menunjukkan kategori permission (Biru: umum, Kuning: pending, Hijau: completed,
                        Merah: expired)</li>
                    <li>• Klik tombol untuk memberikan atau me-refresh permission</li>
                </ul>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }
    </style>
</body>

</html>
