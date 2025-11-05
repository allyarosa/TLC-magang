<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>500 Internal Server Error - Teaching and Learning Certification</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        <div class="bg-white rounded-xl shadow-lg p-8 mb-6">
            <!-- Icon -->
            <div class="w-16 h-16 mx-auto mb-6 bg-red-50 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                    </path>
                </svg>
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-700 mb-3">Terjadi Kesalahan Server</h2>

            <!-- Description -->
            <p class="text-gray-600 mb-6">
                Maaf, terjadi kesalahan pada server kami. Tim kami telah diberitahu dan sedang memperbaikinya.
            </p>

            <!-- Status -->
            <div class="inline-flex items-center space-x-2 bg-red-50 px-4 py-2 rounded-lg mb-6">
                <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                <span class="text-sm text-red-700 font-medium">Error 500 - Internal Server Error</span>
            </div>

            <!-- Action Button -->
            <a href="{{ url()->previous() }}"
                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2.5 rounded-lg transition-colors">
                Kembali
            </a>
        </div>
    </div>
</body>
</html>
