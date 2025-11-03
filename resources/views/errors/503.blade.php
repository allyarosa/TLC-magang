<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance Mode - Teaching and Learning Certification</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen flex items-center justify-center px-4">
    <div class="max-w-2xl w-full mx-auto text-center">
        <!-- Header dengan Logo dan Nama Website -->
        <div class="mb-12">
            <div class="flex items-center justify-center space-x-4 mb-6">
                <!-- Logo Container -->
                <div class="w-16 h-16 bg-blue-500 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                        </path>
                    </svg>
                </div>
                <!-- Nama Website -->
                <div class="text-left">
                    <h1 class="text-2xl font-bold text-gray-800">Teaching and Learning</h1>
                    <p class="text-lg font-semibold text-blue-600">Certification</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl shadow-xl p-8 mb-8 border border-blue-100">
            <!-- Animated Icon -->
            <div class="mb-8">
                <div class="relative inline-block">
                    <div
                        class="w-32 h-32 mx-auto bg-white rounded-full shadow-lg flex items-center justify-center border border-blue-200">
                        <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                        </svg>
                    </div>
                    <!-- Pulsing Ring -->
                    <div class="absolute inset-0 rounded-full border-4 border-blue-200 animate-ping opacity-20"></div>
                </div>
            </div>

            <!-- Title -->
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Sedang Dalam Pemeliharaan</h2>

            <!-- Description -->
            <p class="text-gray-600 mb-8 text-lg leading-relaxed max-w-md mx-auto">
                Platform Teaching and Learning Certification sedang ditingkatkan untuk memberikan pengalaman belajar dan
                sertifikasi yang lebih baik.
            </p>

            <!-- Status Card -->
            <div class="bg-white rounded-xl shadow-sm border border-blue-200 p-6 mb-8">
                <div class="flex items-center justify-center space-x-3 mb-3">
                    <div class="w-4 h-4 bg-blue-500 rounded-full animate-pulse"></div>
                    <span class="text-blue-700 font-semibold text-lg">Maintenance Mode</span>
                </div>
                <div class="text-blue-600 font-medium">Error 503 - Service Temporarily Unavailable</div>
                <div class="mt-4 pt-4 border-t border-blue-100">
                    <p class="text-sm text-gray-500">Perkiraan waktu penyelesaian: <span
                            class="text-blue-600 font-medium">Beberapa jam mendatang</span></p>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex justify-between text-sm text-gray-500 mb-2">
                    <span>Progress Update</span>
                    <span>65%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-500 h-2 rounded-full w-2/3 animate-pulse"></div>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="text-center">
            <p class="text-gray-500 mb-4">Butuh bantuan segera?</p>
            <div class="flex justify-center space-x-6">
                <a href="mailto:support@teaching-learning-cert.com"
                    class="inline-flex items-center text-blue-600 hover:text-blue-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    Email Support
                </a>
                <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    Live Chat
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <p class="text-gray-400 text-sm">
                &copy; 2024 Teaching and Learning Certification. All rights reserved.
            </p>
        </div>
    </div>

    <!-- Background Decoration -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-40 -right-32 w-80 h-80 bg-blue-50 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute -bottom-40 -left-32 w-80 h-80 bg-blue-50 rounded-full blur-3xl opacity-50"></div>
    </div>
</body>

</html>
