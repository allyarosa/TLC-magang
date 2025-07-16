<nav class="mb-20">
    <div class="fixed w-full z-20 top-0 start-0 bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-4 px-6">

            <!-- Brand Section -->
            <div class="flex items-center space-x-4">
                <img src="images/logo.svg" class="h-10 w-10 md:h-14 md:w-14" alt="TLC Logo">
                <div>
                    <h1 class="text-lg md:text-2xl font-bold text-gray-800 tracking-wide capitalize">TLC Program
                    </h1>
                    <p class="text-xs md:text-sm text-gray-500 font-medium capitalize">
                        Teaching & Learning Certification
                    </p>
                </div>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="lg:hidden">
                <button id="mobile-menu-toggle" class="text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation Menu -->
            <div id="mobile-menu"
                class="hidden lg:flex fixed lg:static inset-x-0 top-16 lg:top-0 bg-white lg:bg-transparent pb-4 lg:pb-0 border-b lg:border-0">
                <div
                    class="container mx-auto px-4 lg:px-0 flex flex-col lg:flex-row items-center space-y-4 lg:space-y-0 lg:space-x-6">
                    <a href="{{ route('asesi.dashboard') }}"
                        class="text-gray-800 font-semibold hover:text-blue-600 transition transform hover:scale-105 capitalize">Dashboard</a>
                    <a href="{{ route('asesi.sertifikasi') }}"
                        class="text-gray-800 font-semibold hover:text-blue-600 transition transform hover:scale-105 capitalize">Sertifikasi</a>
                    <a href="{{ route('asesi.transaksi') }}"
                        class="text-gray-800 font-semibold hover:text-blue-600 transition transform hover:scale-105 capitalize">Transaksi</a>
                </div>
            </div>

            <!-- User Interaction -->
            <div class="hidden lg:flex items-center space-x-4">

                <!-- Search -->
                <div class="relative">
                    <input type="text" placeholder="Cari Data"
                        class="pl-8 pr-2 py-2 w-40 rounded-full bg-gray-100 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
                    <svg class="absolute left-2 top-3 h-4 w-4 text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 006.15 12.65z"></path>
                    </svg>
                </div>

                <!-- Notification -->
                <div class="relative">
                    <svg class="h-7 w-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .386-.149.757-.405 1.035L4 17h5m6 0a3 3 0 11-6 0">
                        </path>
                    </svg>
                    <span
                        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">3</span>
                </div>

                <!-- Profile -->
                <div class="relative">
                    <button id="profile-button" class="flex items-center space-x-2">
                        <img src="images/aliando.jpg"
                            class="h-10 w-10 rounded-full object-cover border-2 border-gray-300 shadow-md"
                            alt="Profile">
                        <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div id="profile-menu"
                        class="absolute right-0 top-16 w-64 bg-white shadow-lg rounded-lg border border-gray-200 hidden">
                        <div class="py-2">
                            <div class="px-4 py-2 hover:bg-gray-100 flex items-center space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="text-gray-700">Lihat Profil</span>
                            </div>
                            
                            <!-- New Edit Profile Option -->
                            <div class="px-4 py-2 hover:bg-gray-100 flex items-center space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="text-green-500">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                                <a href="#edit-profile" class="text-gray-700">Edit Profile</a>
                            </div>
                            
                            <div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100 flex items-center space-x-3 text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.toggle('hidden');
            });

            const profileButton = document.getElementById("profile-button");
            const profileMenu = document.getElementById("profile-menu");
            profileButton.addEventListener("click", function(event) {
                event.stopPropagation();
                profileMenu.classList.toggle("hidden");
            });
            document.addEventListener("click", function(event) {
                if (!profileMenu.contains(event.target) && !profileButton.contains(event.target)) {
                    profileMenu.classList.add("hidden");
                }
            });
        });
    </script>
</nav>