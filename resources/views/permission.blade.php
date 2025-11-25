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

            'HOTS_LOCK',
            'PCK_LOCK',
            'NUMERASI_LOCK',
            'LITERASI_LOCK',

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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-6">
             <a href="{{ route('asesi.dashboard') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>
        <!-- Header -->
        <div class="mb-12 text-center">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Permission Management</h1>
            <p class="mt-3 text-lg text-gray-500">
                Manage access rights for <span class="font-semibold text-gray-800">{{ Auth::user()->name }}</span>
            </p>
            <div class="mt-2 inline-flex items-center px-3 py-1 rounded-full bg-gray-100 text-sm text-gray-600">
                {{ Auth::user()->email }}
            </div>
        </div>

        <!-- Alerts -->
        @if (session('success'))
            <div class="mb-8 rounded-md bg-green-50 p-4 border border-green-200">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('info'))
            <div class="mb-8 rounded-md bg-blue-50 p-4 border border-blue-200">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-800">{{ session('info') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Content -->
        <div class="space-y-16">
            @foreach ($groupedPermissions as $category => $perms)
                <section>
                    <div class="flex items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">{{ $category }}</h2>
                        <span class="ml-3 px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                            {{ count($perms) }}
                        </span>
                        <div class="ml-4 flex-grow border-t border-gray-200"></div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($perms as $permission)
                            @php
                                $hasPermission = Auth::user()->hasPermissionTo($permission);
                            @endphp
                            <div
                                class="group relative bg-white rounded-xl border {{ $hasPermission ? 'border-indigo-200 shadow-indigo-50' : 'border-gray-200' }} shadow-sm hover:shadow-md transition-all duration-200 flex flex-col">
                                <div class="p-5 flex-grow">
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="p-2 rounded-lg {{ $hasPermission ? 'bg-indigo-50 text-indigo-600' : 'bg-gray-50 text-gray-400' }}">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11.536 16.536L13.95 18.95L11.536 21.364L6.757 16.586L4.343 18.95L1.929 16.536L6.757 11.757L11.757 6.757a6 6 0 018.243 0z">
                                                </path>
                                            </svg>
                                        </div>
                                        @if ($hasPermission)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                Inactive
                                            </span>
                                        @endif
                                    </div>
                                    <h3 class="text-base font-semibold text-gray-900 mb-1">
                                        {{ ucwords(str_replace('_', ' ', strtolower($permission))) }}
                                    </h3>
                                    <p class="text-xs font-mono text-gray-400 truncate" title="{{ $permission }}">
                                        {{ $permission }}
                                    </p>
                                </div>

                                <div class="px-5 pb-5 mt-auto">
                                    <form method="POST" action="{{ route('assign.permission') }}">
                                        @csrf
                                        <input type="hidden" name="permission" value="{{ $permission }}">

                                        @if ($hasPermission)
                                            <input type="hidden" name="action" value="revoke">
                                            <button type="submit"
                                                class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Revoke Access
                                            </button>
                                        @else
                                            <input type="hidden" name="action" value="assign">
                                            <button type="submit"
                                                class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Grant Access
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
