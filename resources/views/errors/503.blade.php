<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance Mode - Teaching and Learning Certification</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full mx-auto text-center">
        <!-- Logo & Title -->
        <div class="mb-8">
            <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-md">
                <img src="{{ asset('assets/img/tlc.png') }}" alt="Logo" class="w-16 h-16">
            </div>
            <h1 class="text-2xl font-bold text-gray-700 mb-1">Teaching and Learning</h1>
            <p class="text-blue-500 font-semibold">Certification</p>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-md p-8 mb-6">
            <!-- Icon -->
            <div class="w-16 h-16 mx-auto mb-6 bg-blue-50 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                    </path>
                </svg>
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-700 mb-3">Sedang Dalam Pemeliharaan</h2>

            <!-- Description -->
            <p class="text-gray-600 mb-6">
                Platform sedang ditingkatkan untuk memberikan pengalaman yang lebih baik.
            </p>

            <!-- Status -->
            <div class="inline-flex items-center space-x-2 bg-blue-50 px-4 py-2 rounded-lg">
                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                <span class="text-sm text-blue-600 font-medium">Error 503 - Service Unavailable</span>
            </div>
        </div>
    </div>
</body>
</html> 
