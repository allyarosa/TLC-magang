{{-- Navigation awal --}}
<!-- Navigasi -->
{{-- <div class="mt-6">
    <div class="flex gap-2 mb-4">
        <button class="bg-blue-600 text-white py-2 px-4 rounded-md flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z"
                    clip-rule="evenodd" />
            </svg>
            Data Nilai Asesipplp
        </button>
        <button class="text-gray-500 py-2 px-4 rounded-md flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM13 14a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Data Asesor
        </button>
        <button class="text-gray-500 py-2 px-4 rounded-md flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
            </svg>
            Data User
        </button>
        <button class="text-gray-500 py-2 px-4 rounded-md flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                    d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                <path d="M3 8a2 2 0 012-2h2a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
            </svg>
            Data Asesi
        </button>
        <button class="text-gray-500 py-2 px-4 rounded-md flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd" />
            </svg>
            Verifikasi
        </button>
    </div>

    <!-- Card container -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <!-- Header dengan judul dan tombol export -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Semua nilai asesi yang diputuskan oleh semua asesor
            </h2>
            <button class="bg-blue-600 text-white py-2 px-4 rounded-md flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                Export Data
            </button>
        </div>

        <!-- Tabel data nilai -->
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-500 border-b">
                    <th class="pb-3">Nama</th>
                    <th class="pb-3">Asesor</th>
                    <th class="pb-3">Pedagogi Modern</th>
                    <th class="pb-3">Manajemen Kelas</th>
                    <th class="pb-3">Teknologi Pendidikan</th>
                    <th class="pb-3">Evaluasi Pembelajaran</th>
                    <th class="pb-3">Rata-rata</th>
                    <th class="pb-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Baris 1 -->
                <tr class="border-b">
                    <td class="py-4 flex items-center">
                        <div
                            class="bg-blue-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 text-blue-600 font-medium">
                            R
                        </div>
                        <span class="font-medium">Rudi Hermawan</span>
                    </td>
                    <td class="py-4">Dr. Budi Santoso</td>
                    <td class="py-4">85</td>
                    <td class="py-4">78</td>
                    <td class="py-4">90</td>
                    <td class="py-4">82</td>
                    <td class="py-4 font-medium">83.75</td>
                    <td class="py-4">
                        <span
                            class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">Lulus</span>
                    </td>
                </tr>

                <!-- Baris 2 -->
                <tr class="border-b">
                    <td class="py-4 flex items-center">
                        <div
                            class="bg-purple-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 text-purple-600 font-medium">
                            D
                        </div>
                        <span class="font-medium">Dewi Susanti</span>
                    </td>
                    <td class="py-4">Prof. Siti Rahayu</td>
                    <td class="py-4">75</td>
                    <td class="py-4">88</td>
                    <td class="py-4">72</td>
                    <td class="py-4">80</td>
                    <td class="py-4 font-medium">78.75</td>
                    <td class="py-4">
                        <span
                            class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">Lulus</span>
                    </td>
                </tr>

                <!-- Baris 3 -->
                <tr class="border-b">
                    <td class="py-4 flex items-center">
                        <div
                            class="bg-orange-100 w-8 h-8 rounded-full flex items-center justify-center mr-3 text-orange-600 font-medium">
                            A
                        </div>
                        <span class="font-medium">Andi Pratama</span>
                    </td>
                    <td class="py-4">Ahmad Wijaya</td>
                    <td class="py-4">65</td>
                    <td class="py-4">70</td>
                    <td class="py-4">85</td>
                    <td class="py-4">68</td>
                    <td class="py-4 font-medium">72</td>
                    <td class="py-4">
                        <span
                            class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm font-medium">Lulus</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Asesi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <!-- Navigasi -->
    <div class="mt-6">
        <div class="flex gap-4 mb-6">
            <button onclick="showSection('nilai')" class="tab-btn bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 px-6 rounded-lg flex items-center gap-3 shadow-lg hover:scale-105 transition-transform duration-300">
                <span class="text-lg font-semibold">Data Nilai Asesi</span>
            </button>
            <button onclick="showSection('asesor')" class="tab-btn bg-gray-100 text-gray-700 py-3 px-6 rounded-lg flex items-center gap-3 shadow-md hover:bg-gray-200 transition duration-300">
                <span class="text-lg font-semibold">Data Asesor</span>
            </button>
            <button onclick="showSection('user')" class="tab-btn bg-gray-100 text-gray-700 py-3 px-6 rounded-lg flex items-center gap-3 shadow-md hover:bg-gray-200 transition duration-300">
                <span class="text-lg font-semibold">Data User</span>
            </button>
            <button onclick="showSection('verifikasi')" class="tab-btn bg-gray-100 text-gray-700 py-3 px-6 rounded-lg flex items-center gap-3 shadow-md hover:bg-gray-200 transition duration-300">
                <span class="text-lg font-semibold">Verifikasi</span>
            </button>
        </div>

        <!-- Kontainer Semua Data -->
        <div class="bg-white rounded-lg shadow-md p-8">

            <!-- Data Nilai Asesi -->
            <div id="nilai" class="content-section">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Data Nilai Asesi</h2>
                <table class="w-full border-collapse text-gray-700">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-4 px-6 text-left">Nama</th>
                            <th class="py-4 px-6 text-left">Asesor</th>
                            <th class="py-4 px-6">Pedagogi Modern</th>
                            <th class="py-4 px-6">Manajemen Kelas</th>
                            <th class="py-4 px-6">Teknologi Pendidikan</th>
                            <th class="py-4 px-6">Evaluasi Pembelajaran</th>
                            <th class="py-4 px-6">Rata-rata</th>
                            <th class="py-4 px-6">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-100 transition duration-300">
                            <td class="py-4 px-6 font-medium">Rudi Hermawan</td>
                            <td class="py-4 px-6">Dr. Budi Santoso</td>
                            <td class="py-4 px-6">85</td>
                            <td class="py-4 px-6">78</td>
                            <td class="py-4 px-6">90</td>
                            <td class="py-4 px-6">82</td>
                            <td class="py-4 px-6 font-bold">83.75</td>
                            <td class="py-4 px-6 text-green-600 font-semibold">Lulus</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Data Asesor -->
            <div id="asesor" class="content-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Data Asesor</h2>
                <p class="text-gray-600">Data asesor akan ditampilkan di sini...</p>
            </div>

            <!-- Data User -->
            <div id="user" class="content-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Data User</h2>
                <p class="text-gray-600">Data user akan ditampilkan di sini...</p>
            </div>

            <!-- Verifikasi -->
            <div id="verifikasi" class="content-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Verifikasi</h2>
                <p class="text-gray-600">Data verifikasi akan ditampilkan di sini...</p>
            </div>
        </div>
    </div>

    <script>
        function showSection(section) {
            // Sembunyikan semua konten
            document.querySelectorAll('.content-section').forEach(el => el.classList.add('hidden'));

            // Tampilkan konten yang sesuai
            document.getElementById(section).classList.remove('hidden');

            // Ubah warna tombol aktif
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-blue-700', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-700');
            });

            // Tambahkan warna ke tombol yang aktif
            event.target.closest('button').classList.remove('bg-gray-100', 'text-gray-700');
            event.target.closest('button').classList.add('bg-gradient-to-r', 'from-blue-500', 'to-blue-700', 'text-white');
        }
    </script>


<!-- Navigasi -->
<div class="grid grid-cols-5 gap-4 mb-8 mt-8">
    <button id="btn-nilai-asesi"
        class="bg-blue-600 text-white py-4 rounded-xl flex items-center justify-center text-lg font-semibold shadow-md hover:bg-blue-700 transition">
        📊 Data Nilai Asesi
    </button>
    <button id="btn-data-asesor"
        class="bg-white text-gray-700 py-4 rounded-xl flex items-center justify-center text-lg font-semibold shadow-md hover:bg-gray-200 transition">
        👨‍🏫 Data Asesor
    </button>
    <button id="btn-data-user"
        class="bg-white text-gray-700 py-4 rounded-xl flex items-center justify-center text-lg font-semibold shadow-md hover:bg-gray-200 transition">
        👤 Data User
    </button>
    <button id="btn-data-asesi"
        class="bg-white text-gray-700 py-4 rounded-xl flex items-center justify-center text-lg font-semibold shadow-md hover:bg-gray-200 transition">
        🎓 Data Asesi
    </button>
    <button id="btn-verifikasi"
        class="bg-white text-gray-700 py-4 rounded-xl flex items-center justify-center text-lg font-semibold shadow-md hover:bg-gray-200 transition">
        ✅ Verifikasi
    </button>
</div>

<!-- Container untuk menampilkan data -->
<div id="content-container" class="bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-bold text-gray-800 mb-4">📋 Semua Nilai Asesi</h2>

    <!-- Tabel data nilai -->
    <div id="data-nilai-asesi" class="overflow-x-auto">
        <table class="w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-blue-100 text-gray-700">
                    <th class="py-3 px-6">Nama</th>
                    <th class="py-3 px-6">Asesor</th>
                    <th class="py-3 px-6">Pedagogi</th>
                    <th class="py-3 px-6">Manajemen</th>
                    <th class="py-3 px-6">Teknologi</th>
                    <th class="py-3 px-6">Evaluasi</th>
                    <th class="py-3 px-6">Rata-rata</th>
                    <th class="py-3 px-6">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-100 transition">
                    <td class="py-4 px-6 font-semibold">Rudi Hermawan</td>
                    <td class="py-4 px-6">Dr. Budi Santoso</td>
                    <td class="py-4 px-6">85</td>
                    <td class="py-4 px-6">78</td>
                    <td class="py-4 px-6">90</td>
                    <td class="py-4 px-6">82</td>
                    <td class="py-4 px-6 font-semibold">83.75</td>
                    <td class="py-4 px-6">
                        <span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm font-medium">Lulus</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Data Asesor (disembunyikan secara default) -->
    <div id="data-asesor" class="hidden">
        <h2 class="text-xl font-bold text-gray-800 mb-4">👨‍🏫 Data Asesor</h2>
        <table class="w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-blue-100 text-gray-700">
                    <th class="py-3 px-6">Nama</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Spesialisasi</th>
                    <th class="py-3 px-6">Status</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-100 transition">
                    <td class="py-4 px-6 font-semibold">Dr. Budi Santoso</td>
                    <td class="py-4 px-6">budi@example.com</td>
                    <td class="py-4 px-6">Pedagogi Modern</td>
                    <td class="py-4 px-6"><span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm font-medium">Aktif</span></td>
                    <td class="py-4 px-6"><button class="text-blue-600">Edit</button> | <button class="text-red-600">Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition">
        Logout
    </button>
</form>

<script>
    document.getElementById("btn-data-asesor").addEventListener("click", function () {
        document.getElementById("data-nilai-asesi").classList.add("hidden");
        document.getElementById("data-asesor").classList.remove("hidden");
    });

    document.getElementById("btn-nilai-asesi").addEventListener("click", function () {
        document.getElementById("data-asesor").classList.add("hidden");
        document.getElementById("data-nilai-asesi").classList.remove("hidden");
    });
</script>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLC Program Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>

    {{-- Navbar --}}
    <header class="mb-20">
        <nav
            class="fixed w-full z-20 top-0 start-0 bg-gradient-to-r from-blue-100 to-blue-200 shadow-md border-b border-blue-300 transition-all duration-300 ease-in-out">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-3 px-6">
                <!-- Brand Section -->
                <div class="flex items-center space-x-3 group cursor-pointer">
                    <div
                        class="bg-blue-800 rounded-full p-2 shadow-lg transform transition-all duration-300 group-hover:scale-110 group-hover:bg-yellow-500 group-hover:rotate-12 group-active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="group-hover:animate-pulse">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <h1
                        class="text-xl font-bold text-blue-800 transform transition-all duration-300 group-hover:text-yellow-500 group-hover:translate-x-1">
                        Dashboard Asesor</h1>
                </div>

                <!-- Interaksi -->
                <div class="flex items-center space-x-6">
                    <!-- Cerah dan Gelap Mode -->
                    <button
                        class="text-yellow-500 hover:text-yellow-600 hover:rotate-45 transition-all duration-300 active:scale-90 focus:outline-none relative overflow-hidden group">
                        <div
                            class="absolute inset-0 bg-yellow-100 rounded-full scale-0 group-hover:scale-150 transition-all duration-500 opacity-0 group-hover:opacity-30">
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="transform transition-transform duration-500">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                    </button>

                    <!-- Notifikasi -->
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-blue-100 rounded-full scale-0 group-hover:scale-150 transition-all duration-500 opacity-0 group-hover:opacity-30">
                        </div>
                        <button
                            class="p-2 transition-all duration-300 hover:rotate-12 active:scale-90 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="text-blue-800 group-hover:text-yellow-500 transition-colors duration-300">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span
                                class="absolute -top-2 -right-2 bg-yellow-500 text-white text-xs rounded-full px-1.5 py-0.5 transform transition-transform duration-300 group-hover:scale-125 group-hover:animate-pulse">3</span>
                        </button>

                        <!-- Notifikasi Dropdown -->
                        <div
                            class="absolute right-0 mt-2 w-72 bg-white rounded-lg shadow-xl border border-blue-200 z-50 hidden group-hover:block transform transition-all duration-300 origin-top-right scale-95 group-hover:scale-100 opacity-0 group-hover:opacity-100">
                            <div class="p-3 border-b border-blue-200">
                                <h3 class="font-bold text-blue-800">Notifications</h3>
                            </div>
                            <div class="max-h-64 overflow-y-auto">
                                <div
                                    class="p-3 border-b border-blue-100 hover:bg-blue-50 transition-colors duration-200">
                                    <p class="text-sm font-medium text-gray-800">New assessment assigned</p>
                                    <p class="text-xs text-gray-500 mt-1">5 minutes ago</p>
                                </div>
                                <div
                                    class="p-3 border-b border-blue-100 hover:bg-blue-50 transition-colors duration-200">
                                    <p class="text-sm font-medium text-gray-800">Review request from admin</p>
                                    <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                                </div>
                                <div class="p-3 hover:bg-blue-50 transition-colors duration-200">
                                    <p class="text-sm font-medium text-gray-800">Deadline reminder: Assessment #4528
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">Yesterday</p>
                                </div>
                            </div>
                            <div class="p-2 border-t border-blue-200 bg-gray-50">
                                <button
                                    class="w-full py-1 text-sm text-blue-600 hover:text-blue-800 transition-colors duration-200">
                                    View all notifications
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Profile -->
                    <div class="relative group">
                        <button id="profile-button" class="flex items-center focus:outline-none">
                            <div
                                class="bg-white h-9 w-9 rounded-full flex items-center justify-center border border-blue-300 shadow-md overflow-hidden transform transition-all duration-300 group-hover:border-yellow-500 group-hover:shadow-lg group-hover:scale-110 group-active:scale-95">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="text-blue-800 group-hover:text-yellow-500 transition-colors duration-300">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                        </button>

                        <!-- Profile Dropdown -->
                        <div id="profile-menu"
                            class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-blue-200 z-50 hidden transform transition-all duration-300 origin-top-right scale-0 opacity-0">
                            <div class="p-4 border-b border-blue-200">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-blue-100 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="text-blue-600">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800">Ahmad Asesor</h4>
                                        <p class="text-xs text-gray-500">Senior Assessor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2">
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-blue-50 transition-colors duration-200 flex items-center space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="text-gray-700">Lihat Profil</span>
                                </a>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-blue-50 transition-colors duration-200 flex items-center space-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path
                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                        </path>
                                    </svg>
                                    <span class="text-gray-700">Pengaturan</span>
                                </a>
                                <div class="border-t border-blue-100 my-1"></div>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-red-50 transition-colors duration-200 flex items-center space-x-3 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const profileButton = document.getElementById("profile-button");
                const profileMenu = document.getElementById("profile-menu");

                if (profileButton && profileMenu) {
                    profileButton.addEventListener("click", function(event) {
                        event.stopPropagation();


                        if (profileMenu.classList.contains("hidden")) {
                            profileMenu.classList.remove("hidden");
                            setTimeout(() => {
                                profileMenu.classList.add("scale-100", "opacity-100");
                                profileMenu.classList.remove("scale-0", "opacity-0");
                            }, 10);
                        } else {
                            profileMenu.classList.remove("scale-100", "opacity-100");
                            profileMenu.classList.add("scale-0", "opacity-0");
                            setTimeout(() => {
                                profileMenu.classList.add("hidden");
                            }, 300);
                        }
                    });

                    document.addEventListener("click", function(event) {
                        if (!profileMenu.contains(event.target) && !profileButton.contains(event.target)) {
                            profileMenu.classList.remove("scale-100", "opacity-100");
                            profileMenu.classList.add("scale-0", "opacity-0");
                            setTimeout(() => {
                                profileMenu.classList.add("hidden");
                            }, 300);
                        }
                    });
                }


                window.addEventListener('scroll', function() {
                    const navbar = document.querySelector('nav');
                    if (window.scrollY > 10) {
                        navbar.classList.add('bg-white', 'shadow-lg');
                        navbar.classList.remove('bg-gradient-to-r', 'from-blue-100', 'to-blue-200',
                        'shadow-md');
                    } else {
                        navbar.classList.remove('bg-white', 'shadow-lg');
                        navbar.classList.add('bg-gradient-to-r', 'from-blue-100', 'to-blue-200', 'shadow-md');
                    }
                });


                const buttons = document.querySelectorAll('button');
                buttons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        const x = e.clientX - e.target.getBoundingClientRect().left;
                        const y = e.clientY - e.target.getBoundingClientRect().top;

                        const ripple = document.createElement('span');
                        ripple.classList.add('ripple');
                        ripple.style.left = `${x}px`;
                        ripple.style.top = `${y}px`;

                        this.appendChild(ripple);

                        setTimeout(() => {
                            ripple.remove();
                        }, 600);
                    });
                });
            });
        </script>
        <style>
            .ripple {
                position: absolute;
                background: rgba(255, 255, 255, 0.5);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            }

            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }

            .group:hover #profile-menu {
                display: block !important;
                animation: fadeInScale 0.3s forwards;
            }

            @keyframes fadeInScale {
                from {
                    opacity: 0;
                    transform: scale(0.95) translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: scale(1) translateY(0);
                }
            }
        </style>
    </header>
    {{-- End Navbar --}}

    {{-- Statistik --}}
    <section class="max-w-7xl mx-auto px-4 py-8">
        <!-- Header dengan gaya modern -->
        <div class="mb-10 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3 relative inline-block">
                <span class="relative z-10">Dashboard Statistik</span>
                <span class="absolute bottom-0 left-0 w-full h-2 bg-yellow-400 z-0 opacity-30"></span>
            </h1>
            <p class="text-gray-600">Ringkasan aktivitas penilaian terkini</p>
        </div>

        <!-- Grid Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Card 1: Total Tugas -->
            <div
                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1 group border-l-4 border-blue-800">
                <div class="p-6">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Tugas</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-1 group-hover:text-blue-800">45</h3>
                        </div>
                        <div
                            class="bg-blue-100 p-3 rounded-full text-blue-800 group-hover:bg-blue-800 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-3">Tugas penilaian yang diberikan</p>
                </div>
            </div>

            <!-- Card 2: Menunggu Dinilai -->
            <div
                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1 group border-l-4 border-yellow-500">
                <div class="p-6">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Menunggu Dinilai</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-1 group-hover:text-yellow-600">12</h3>
                        </div>
                        <div
                            class="bg-yellow-100 p-3 rounded-full text-yellow-600 group-hover:bg-yellow-500 group-hover:text-white transition-colors animate-pulse">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-3">Asesi yang belum dinilai</p>
                </div>
            </div>

            <!-- Card 3: Selesai Dinilai -->
            <div
                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1 group border-l-4 border-green-500">
                <div class="p-6">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Selesai Dinilai</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-1 group-hover:text-green-600">33</h3>
                        </div>
                        <div
                            class="bg-green-100 p-3 rounded-full text-green-600 group-hover:bg-green-500 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-3">Asesi yang sudah dinilai</p>
                </div>
            </div>

            <!-- Card 4: Total Asesi -->
            <div
                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 transform hover:-translate-y-1 group border-l-4 border-purple-500">
                <div class="p-6">
                    <div class="flex justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Asesi</p>
                            <h3 class="text-3xl font-bold text-gray-800 mt-1 group-hover:text-purple-600">78</h3>
                        </div>
                        <div
                            class="bg-purple-100 p-3 rounded-full text-purple-600 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-3">Jumlah asesi yang ditugaskan</p>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
            <div class="p-6 border-b border-gray-100">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <h2 class="text-xl font-bold text-gray-800 mb-2 md:mb-0">Statistik Penilaian Bulanan</h2>
                    <div class="flex space-x-2">
                        <button
                            class="px-3 py-1.5 bg-blue-800 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export
                        </button>
                        <button
                            class="px-3 py-1.5 border border-gray-300 text-gray-700 text-sm rounded-lg hover:bg-gray-50 transition-colors">
                            Filter
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <!-- Chart Container -->
                <div class="relative h-64">
                    <!-- Y-axis -->
                    <div
                        class="absolute left-0 top-0 h-full flex flex-col justify-between text-xs text-gray-500 font-medium">
                        <span>60</span>
                        <span>45</span>
                        <span>30</span>
                        <span>15</span>
                        <span>0</span>
                    </div>

                    <!-- Chart Bars -->
                    <div class="ml-8 h-full flex items-end space-x-6">
                        <!-- January -->
                        <div class="group flex-1 h-full flex flex-col justify-end items-center">
                            <div class="w-full flex flex-col items-center" style="height: 83.33%">
                                <div class="w-3/4 bg-blue-800 rounded-t-md h-full relative">
                                    <div
                                        class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        40 Lulus
                                    </div>
                                </div>
                                <div class="w-3/4 bg-yellow-500 rounded-t-md mt-1 h-1/6 relative">
                                    <div
                                        class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 bg-yellow-500 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        5 Tidak Lulus
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-xs text-gray-600 font-medium mt-2 group-hover:text-blue-800 transition-colors">Jan</span>
                        </div>

                        <!-- February -->
                        <div class="group flex-1 h-full flex flex-col justify-end items-center">
                            <div class="w-full flex flex-col items-center" style="height: 75%">
                                <div class="w-3/4 bg-blue-800 rounded-t-md h-full relative">
                                    <div
                                        class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        35 Lulus
                                    </div>
                                </div>
                                <div class="w-3/4 bg-yellow-500 rounded-t-md mt-1 h-1/4 relative">
                                    <div
                                        class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 bg-yellow-500 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        8 Tidak Lulus
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-xs text-gray-600 font-medium mt-2 group-hover:text-blue-800 transition-colors">Feb</span>
                        </div>

                        <!-- March -->
                        <div class="group flex-1 h-full flex flex-col justify-end items-center">
                            <div class="w-full flex flex-col items-center" style="height: 91.66%">
                                <div class="w-3/4 bg-blue-800 rounded-t-md h-full relative">
                                    <div
                                        class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        45 Lulus
                                    </div>
                                </div>
                                <div class="w-3/4 bg-yellow-500 rounded-t-md mt-1 h-1/5 relative">
                                    <div
                                        class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 bg-yellow-500 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        10 Tidak Lulus
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-xs text-gray-600 font-medium mt-2 group-hover:text-blue-800 transition-colors">Mar</span>
                        </div>

                        <!-- April -->
                        <div class="group flex-1 h-full flex flex-col justify-end items-center">
                            <div class="w-full flex flex-col items-center" style="height: 66.66%">
                                <div class="w-3/4 bg-blue-800 rounded-t-md h-full relative">
                                    <div
                                        class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        32 Lulus
                                    </div>
                                </div>
                                <div class="w-3/4 bg-yellow-500 rounded-t-md mt-1 h-1/3 relative">
                                    <div
                                        class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 bg-yellow-500 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        12 Tidak Lulus
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-xs text-gray-600 font-medium mt-2 group-hover:text-blue-800 transition-colors">Apr</span>
                        </div>

                        <!-- May -->
                        <div class="group flex-1 h-full flex flex-col justify-end items-center">
                            <div class="w-full flex flex-col items-center" style="height: 75%">
                                <div class="w-3/4 bg-blue-800 rounded-t-md h-full relative">
                                    <div
                                        class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        38 Lulus
                                    </div>
                                </div>
                                <div class="w-3/4 bg-yellow-500 rounded-t-md mt-1 h-1/6 relative">
                                    <div
                                        class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 bg-yellow-500 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        7 Tidak Lulus
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-xs text-gray-600 font-medium mt-2 group-hover:text-blue-800 transition-colors">Mei</span>
                        </div>

                        <!-- June -->
                        <div class="group flex-1 h-full flex flex-col justify-end items-center">
                            <div class="w-full flex flex-col items-center" style="height: 83.33%">
                                <div class="w-3/4 bg-blue-800 rounded-t-md h-full relative">
                                    <div
                                        class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        42 Lulus
                                    </div>
                                </div>
                                <div class="w-3/4 bg-yellow-500 rounded-t-md mt-1 h-1/6 relative">
                                    <div
                                        class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 bg-yellow-500 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                        8 Tidak Lulus
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-xs text-gray-600 font-medium mt-2 group-hover:text-blue-800 transition-colors">Jun</span>
                        </div>
                    </div>
                </div>

                <!-- Legend -->
                <div class="flex justify-center space-x-6 mt-8">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-blue-800 rounded-full mr-2"></div>
                        <span class="text-xs text-gray-600 font-medium">Lulus</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                        <span class="text-xs text-gray-600 font-medium">Tidak Lulus</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Statistik --}}

    {{-- Notifikasi --}}
    <section class="max-w-7xl mx-auto px-4 py-6">
        <!-- Notifikasi-->
        <div class="mb-6 transform transition duration-500 hover:translate-x-2">
            <h1 class="text-xl font-bold text-gray-800 relative inline-block">
                Notifikasi
                <span class="absolute -right-3 -top-2 flex h-4 w-4">
                    {{-- <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-yellow-500"></span> --}}
                </span>
            </h1>
            <p class="text-sm text-gray-600 mt-1">Asets yang menunggu untuk dinilai dan notifikasi lainnya</p>
        </div>

        <!-- Notifikasi Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <!-- Menunggu Penilaian Card -->
            <div
                class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 hover:scale-103 cursor-pointer group">
                <div class="flex items-start">
                    <div
                        class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 transition-all duration-300 shadow-sm group-hover:shadow">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-blue-600 group-hover:text-blue-700 group-hover:rotate-12 transition-all duration-300"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-gray-800 group-hover:text-black transition-colors duration-300">
                            Menunggu Penilaian</h2>
                        <div class="flex items-center mt-1">
                            <span
                                class="text-2xl font-bold text-gray-800 mr-2 group-hover:text-blue-600 transition-colors duration-300">8</span>
                            <span class="text-xs text-gray-600">Asets yang menunggu untuk dinilai</span>
                        </div>
                        <button
                            class="mt-3 bg-blue-800 hover:bg-blue-700 text-white text-sm font-medium py-1.5 px-3 rounded-md transform transition duration-300 hover:scale-105 hover:shadow-md active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                            Nilai Sekarang
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tenggat Dekat Card -->
            <div
                class="bg-gradient-to-br from-yellow-50 to-yellow-100 border border-yellow-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 hover:scale-103 cursor-pointer group">
                <div class="flex items-start">
                    <div
                        class="bg-yellow-100 group-hover:bg-yellow-200 rounded-full p-2 mr-3 transition-all duration-300 shadow-sm group-hover:shadow">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-yellow-600 group-hover:text-yellow-700 group-hover:animate-pulse transition-all duration-300"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-gray-800 group-hover:text-black transition-colors duration-300">
                            Tenggat Dekat</h2>
                        <div class="flex items-center mt-1">
                            <span
                                class="text-2xl font-bold text-gray-800 mr-2 group-hover:text-yellow-600 transition-colors duration-300">2</span>
                            <span class="text-xs text-gray-600">Penilaian harus segera diselesaikan</span>
                        </div>
                        <button
                            class="mt-3 bg-blue-800 hover:bg-blue-700 text-white text-sm font-medium py-1.5 px-3 rounded-md transform transition duration-300 hover:scale-105 hover:shadow-md active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                            Lihat Prioritas
                        </button>
                    </div>
                </div>
            </div>

            <!-- Jadwal Hari Ini Card -->
            <div
                class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 hover:scale-103 cursor-pointer group">
                <div class="flex items-start">
                    <div
                        class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 transition-all duration-300 shadow-sm group-hover:shadow">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-blue-600 group-hover:text-blue-700 group-hover:rotate-12 transition-all duration-300"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-gray-800 group-hover:text-black transition-colors duration-300">
                            Jadwal Hari Ini</h2>
                        <div class="flex items-center mt-1">
                            <span
                                class="text-2xl font-bold text-gray-800 mr-2 group-hover:text-blue-600 transition-colors duration-300">3</span>
                            <span class="text-xs text-gray-600">Penilaian dijadwalkan hari ini</span>
                        </div>
                        <button
                            class="mt-3 bg-blue-800 hover:bg-blue-700 text-white text-sm font-medium py-1.5 px-3 rounded-md transform transition duration-300 hover:scale-105 hover:shadow-md active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                            Lihat Jadwal
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- All Notifikasi-->
        <div
            class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
            <div
                class="flex justify-between items-center px-4 py-3 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-white">
                <div>
                    <h2 class="font-bold text-gray-800">Semua Notifikasi</h2>
                    <p class="text-xs text-gray-600">Anda memiliki 2 asets yang menunggu penilaian</p>
                </div>
                <button
                    class="text-sm text-blue-800 hover:text-blue-600 font-medium transition duration-300 hover:underline transform hover:scale-105 focus:outline-none">
                    Tandai semua telah dibaca
                </button>
            </div>

            <!-- Notifikasi List -->
            <div class="divide-y divide-gray-200">
                <!-- Notification Item 1 -->
                <div class="px-4 py-3 relative hover:bg-blue-50 transition-colors duration-300 cursor-pointer group">
                    <div class="flex items-start">
                        <div
                            class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 flex-shrink-0 transition-all duration-300 transform group-hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-bold text-gray-800 group-hover:text-black transition-colors duration-300">
                                Asets Baru Menunggu Penilaian</h3>
                            <p
                                class="text-sm text-gray-600 mt-1 group-hover:text-gray-700 transition-colors duration-300">
                                Ahmad Fauzi (ID: ASE-001) telah menyelesaikan tugas dan menunggu penilaian.</p>
                            <button
                                class="mt-2 bg-blue-800 hover:bg-blue-700 text-white text-sm font-medium py-1.5 px-3 rounded-md transform transition duration-300 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                Nilai Sekarang
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute top-3 right-4 bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                        2 jam yang lalu
                    </div>
                </div>

                <!-- Notification Item 2 -->
                <div class="px-4 py-3 relative hover:bg-blue-50 transition-colors duration-300 cursor-pointer group">
                    <div class="flex items-start">
                        <div
                            class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 flex-shrink-0 transition-all duration-300 transform group-hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-bold text-gray-800 group-hover:text-black transition-colors duration-300">
                                Asets Baru Menunggu Penilaian</h3>
                            <p
                                class="text-sm text-gray-600 mt-1 group-hover:text-gray-700 transition-colors duration-300">
                                Siti Nurhaliza (ID: ASE-002) telah menyelesaikan tugas dan menunggu penilaian.</p>
                            <button
                                class="mt-2 bg-blue-800 hover:bg-blue-700 text-white text-sm font-medium py-1.5 px-3 rounded-md transform transition duration-300 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                Nilai Sekarang
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute top-3 right-4 bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                        3 jam yang lalu
                    </div>
                </div>

                <!-- Notification Item 3 -->
                <div class="px-4 py-3 relative hover:bg-yellow-50 transition-colors duration-300 cursor-pointer group">
                    <div class="flex items-start">
                        <div
                            class="bg-yellow-100 group-hover:bg-yellow-200 rounded-full p-2 mr-3 flex-shrink-0 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-yellow-600 group-hover:animate-pulse" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-bold text-gray-800 group-hover:text-black transition-colors duration-300">
                                Tenggat Waktu Penilaian</h3>
                            <p
                                class="text-sm text-gray-600 mt-1 group-hover:text-gray-700 transition-colors duration-300">
                                Penilaian untuk Budi Santoso (ID: ASE-003) harus diselesaikan dalam 24 jam.</p>
                            <button
                                class="mt-2 bg-blue-800 hover:bg-blue-700 text-white text-sm font-medium py-1.5 px-3 rounded-md transform transition duration-300 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                                Prioritaskan
                            </button>
                        </div>
                    </div>
                    <div
                        class="absolute top-3 right-4 bg-yellow-100 text-yellow-800 text-xs px-2 py-0.5 rounded-full group-hover:bg-yellow-200 transition-colors duration-300">
                        30 menit yang lalu
                    </div>
                </div>

                <!-- Notification Item 4 -->
                <div class="px-4 py-3 relative hover:bg-blue-50 transition-colors duration-300 cursor-pointer group">
                    <div class="flex items-start">
                        <div
                            class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 flex-shrink-0 transition-all duration-300 transform group-hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-bold text-gray-800 group-hover:text-black transition-colors duration-300">
                                Penilaian Berhasil Disimpan</h3>
                            <p
                                class="text-sm text-gray-600 mt-1 group-hover:text-gray-700 transition-colors duration-300">
                                Penilaian untuk Dian Kartika (ID: ASE-004) telah berhasil disimpan.</p>
                        </div>
                    </div>
                    <div
                        class="absolute top-3 right-4 bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                        1 hari yang lalu
                    </div>
                </div>

                <!-- Notification Item 5 -->
                <div class="px-4 py-3 relative hover:bg-blue-50 transition-colors duration-300 cursor-pointer group">
                    <div class="flex items-start">
                        <div
                            class="bg-blue-100 group-hover:bg-blue-200 rounded-full p-2 mr-3 flex-shrink-0 transition-all duration-300 transform group-hover:rotate-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1v-3a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-bold text-gray-800 group-hover:text-black transition-colors duration-300">
                                Asets Baru Diopaskan</h3>
                            <p
                                class="text-sm text-gray-600 mt-1 group-hover:text-gray-700 transition-colors duration-300">
                                5 asets baru telah ditugaskan kepada Anda untuk dinilai.</p>
                        </div>
                    </div>
                    <div
                        class="absolute top-3 right-4 bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full group-hover:bg-blue-200 transition-colors duration-300">
                        2 hari yang lalu
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();

                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    top: ${y}px;
                    left: ${x}px;
                    background: rgba(255, 255, 255, 0.7);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;

                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);

                    e.stopPropagation();
                });
            });


            document.addEventListener('DOMContentLoaded', () => {
                const notificationItems = document.querySelectorAll('.divide-y > div');
                notificationItems.forEach((item, index) => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(10px)';
                    item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';

                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, 100 + (index * 100));
                });
            });


            const style = document.createElement('style');
            style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
            document.head.appendChild(style);
        </script>
    </section>
    {{-- End Notifikasi --}}

    {{-- List Absesnsi B & C --}}
    <section class="max-w-7xl mx-auto px-4 py-8 bg-gray-50 min-h-screen">
        <!-- List Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-black border-b-4 border-yellow-500 pb-2 inline-block">List Asesi B & C
            </h1>
        </div>

        <!-- Assessment Management Card -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="mb-4">
                <h2 class="text-xl font-bold text-gray-800">Daftar Asesi</h2>
                <p class="text-sm text-gray-600">Kelola dan nilai asesi kategori B dan C</p>
            </div>

            <!-- Search and Filter Row -->
            <div class="flex flex-col md:flex-row justify-between mb-6 gap-4">
                <!-- Search -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Cari asesi..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800">
                </div>

                <!-- Filters -->
                <div class="flex gap-3">
                    <button
                        class="flex items-center gap-2 border border-blue-800 text-blue-800 px-4 py-2 rounded-lg hover:bg-blue-50 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter
                    </button>
                    <button
                        class="flex items-center gap-2 border border-blue-800 text-blue-800 px-4 py-2 rounded-lg hover:bg-blue-50 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Urutkan
                    </button>
                    <div class="relative">
                        <select
                            class="appearance-none border border-gray-300 rounded-lg pl-4 pr-10 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800">
                            <option>Semua Kategori</option>
                            <option>Kategori B</option>
                            <option>Kategori C</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto border border-gray-200 rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead style="background-color: #00549D;">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Nama Asesi
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Kategori
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Terakhir Diperbarui
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Nilai
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Row 1 -->
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Budi Santoso</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Kategori B
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                2 jam yang lalu
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <button
                                    class="bg-blue-800 hover:bg-blue-700 text-white px-3 py-1 rounded-lg flex items-center gap-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Nilai
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Siti Rahayu</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                    Kategori C
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                3 jam yang lalu
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <button
                                    class="bg-blue-800 hover:bg-blue-700 text-white px-3 py-1 rounded-lg flex items-center gap-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Nilai
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Agus Wijaya</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Kategori B
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                    Lulus
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                1 hari yang lalu
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" style="color: #0083D0;">
                                85
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <button
                                    class="border border-blue-800 text-blue-800 hover:bg-blue-50 px-3 py-1 rounded-lg flex items-center gap-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Unduh
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 4 -->
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Dewi Lestari</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                    Kategori C
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                    Lulus
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                2 hari yang lalu
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" style="color: #F8C82A;">
                                78
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <button
                                    class="border border-blue-800 text-blue-800 hover:bg-blue-50 px-3 py-1 rounded-lg flex items-center gap-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Unduh
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 5 -->
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Rudi Hartono</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Kategori B
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                5 jam yang lalu
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <button
                                    class="bg-blue-800 hover:bg-blue-700 text-white px-3 py-1 rounded-lg flex items-center gap-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Nilai
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 6 -->
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Rina Wati</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                    Kategori C
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                    Lulus
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                3 hari yang lalu
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" style="color: #7E5BD0;">
                                92
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <button
                                    class="border border-blue-800 text-blue-800 hover:bg-blue-50 px-3 py-1 rounded-lg flex items-center gap-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Unduh
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 7 -->
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Joko Susilo</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Kategori B
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                    Lulus
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                4 hari yang lalu
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" style="color: #0083D0;">
                                88
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                <button
                                    class="border border-blue-800 text-blue-800 hover:bg-blue-50 px-3 py-1 rounded-lg flex items-center gap-1 transition duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Unduh
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                <button class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                    Lihat Semua Asesi
                </button>
            </div>
        </div>

        <!-- Add hover effects and interactive elements with JavaScript -->
        <script>
            // Add hover effect to table rows
            document.querySelectorAll('tbody tr').forEach(row => {
                row.addEventListener('mouseenter', () => {
                    row.classList.add('bg-green-50', 'transition-colors', 'duration-200');
                });

                row.addEventListener('mouseleave', () => {
                    row.classList.remove('bg-green-50');
                });
            });

            // Add click animation to buttons
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function(e) {
                    // Create ripple effect
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();

                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    top: ${y}px;
                    left: ${x}px;
                    background: rgba(255, 255, 255, 0.7);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;

                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Add keyframe animation for ripple effect
            const style = document.createElement('style');
            style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
            document.head.appendChild(style);
        </script>
    </section>
    {{-- End List Absesnsi B & C --}}

    {{-- Form Penilaian --}}
    <section class="relative max-w-7xl mx-auto px-4 py-8">
        <div class="bg-gray-50 rounded-xl shadow-lg overflow-hidden">
            <!-- Form Header with Icon -->
            <div class="p-4">
                <div class="flex items-center text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h1 class="text-xl font-bold">Form Penilaian</h1>
                </div>
            </div>

            <!-- Assessment Header Section -->
            <div class="bg-yellow-500 p-5 text-white">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <h2 class="text-xl font-bold">Penilaian Asesi</h2>
                </div>
                <p class="text-sm mt-1">Berikan skor dan komentar untuk asesi</p>
            </div>

            <!-- Form Content -->
            <div class="p-5">
                <!-- Select Assessor -->
                <div class="mb-5">
                    <label class="block text-gray-700 mb-2">Pilih Asesi</label>
                    <div class="relative">
                        <select
                            class="block w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-full leading-tight focus:outline-none focus:border-blue-800">
                            <option>Ahmad Fauzi - Kategori B</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Assessor Info Card -->
                <div class="bg-blue-50 rounded-lg p-4 mb-5 flex items-center">
                    <div class="bg-gray-200 rounded-full h-16 w-16 flex items-center justify-center mr-4">
                        <!-- Placeholder for profile image -->
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Ahmad Fauzi</h3>
                        <p class="text-sm text-gray-600">ID: ASI-2023-001</p>
                        <span
                            class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mt-1">Kategori
                            B</span>
                    </div>
                </div>

                <!-- Competency Unit Section -->
                <div class="mb-5">
                    <div class="flex items-center text-yellow-600 mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        <h3 class="font-bold">Unit Kompetensi: Mengoperasikan Komputer</h3>
                    </div>
                    <p class="text-sm text-gray-600 ml-6">Kode: COM001</p>
                </div>

                <!-- Assessment Radio Buttons -->
                <div class="mb-5">
                    <h3 class="text-gray-700 mb-2">Penilaian</h3>
                    <div class="flex items-center mb-2">
                        <input id="kompeten" name="assessment" type="radio" checked
                            class="h-4 w-4 text-blue-800 focus:ring-blue-800">
                        <label for="kompeten" class="ml-2 block text-gray-700">Kompeten</label>
                    </div>
                    <div class="flex items-center">
                        <input id="belum-kompeten" name="assessment" type="radio"
                            class="h-4 w-4 text-blue-800 focus:ring-blue-800">
                        <label for="belum-kompeten" class="ml-2 block text-gray-700">Belum Kompeten</label>
                    </div>
                </div>

                <!-- Score Dropdown -->
                <div class="mb-5">
                    <label class="block text-gray-700 mb-2">Skor</label>
                    <div class="relative">
                        <select
                            class="block w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-full leading-tight focus:outline-none focus:border-blue-800">
                            <option>Pilih skor</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Comment Textarea -->
                <div class="mb-5">
                    <label class="block text-gray-700 mb-2">Komentar</label>
                    <textarea
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:border-blue-800"
                        rows="4" placeholder="Berikan komentar atau umpan balik untuk asesi..."></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between mt-8">
                    <button
                        class="border border-gray-300 text-gray-700 rounded-lg px-5 py-2 hover:bg-gray-100 transition duration-200">
                        Simpan Draft
                    </button>
                    <button
                        class="bg-blue-800 text-white rounded-lg px-5 py-2 hover:bg-blue-700 transition duration-200">
                        Kirim Penilaian
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- End Form Penilaian --}}

    {{-- Riwayat Penilaian --}}
    <section class="relative max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-1 text-black border-b-4 border-yellow-500 pb-2 inline-block">Riwayat Penilaian
        </h1>

        <div class="bg-white mt-6 rounded-lg shadow-md overflow-hidden">
            <div class="flex items-center p-6" style="background-color: #F8C82A;">
                <div class="flex items-center text-gray-800">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="ml-2">
                        <h2 class="text-xl font-bold text-gray-900">Riwayat Penilaian</h2>
                        <p class="text-sm text-gray-700">Daftar penilaian yang telah dilakukan</p>
                    </div>
                </div>

                <div class="ml-auto flex items-center space-x-2">
                    <div class="relative">
                        <input type="text" placeholder="Cari asesi..."
                            class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 w-64 focus:outline-none focus:ring-2 focus:ring-blue-800">
                        <svg class="w-5 h-5 absolute left-3 top-3 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <button
                        class="px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700">Filter</button>
                    <button
                        class="px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700 flex items-center">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Export
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-200" style="background-color: #00549D;">
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Nama Asesi
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Kompetensi
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Tanggal
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Nilai
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">Status</th>
                            <th class="py-3 px-6 text-right text-white font-medium text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900">Budi Santoso</td>
                            <td class="py-4 px-6 text-sm text-gray-700">Kompetensi B</td>
                            <td class="py-4 px-6 text-sm text-gray-700">28 Apr 2023</td>
                            <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">85</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Lulus</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button class="text-blue-800 hover:text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900">Ani Wijaya</td>
                            <td class="py-4 px-6 text-sm text-gray-700">Kompetensi C</td>
                            <td class="py-4 px-6 text-sm text-gray-700">27 Apr 2023</td>
                            <td class="py-4 px-6 text-sm font-medium" style="color: #F8C82A;">78</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Lulus</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button class="text-blue-800 hover:text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900">Dedi Cahyono</td>
                            <td class="py-4 px-6 text-sm text-gray-700">Kompetensi B</td>
                            <td class="py-4 px-6 text-sm text-gray-700">26 Apr 2023</td>
                            <td class="py-4 px-6 text-sm font-medium" style="color: #7E5BD0;">92</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Lulus</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button class="text-blue-800 hover:text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900">Eva Sari</td>
                            <td class="py-4 px-6 text-sm text-gray-700">Kompetensi C</td>
                            <td class="py-4 px-6 text-sm text-gray-700">25 Apr 2023</td>
                            <td class="py-4 px-6 text-sm font-medium" style="color: #FF0000;">65</td>
                            <td class="py-4 px-6 text-sm">
                                <span class="px-3 py-1 bg-red-500 text-white rounded-full text-xs font-medium">Tidak
                                    Lulus</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button class="text-blue-800 hover:text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900">Faisal Rahman</td>
                            <td class="py-4 px-6 text-sm text-gray-700">Kompetensi B</td>
                            <td class="py-4 px-6 text-sm text-gray-700">24 Apr 2023</td>
                            <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">88</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Lulus</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button class="text-blue-800 hover:text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{-- End Riwayat Penilaian --}}

    {{-- Riwayat  Aktifitas --}}
    <section class="relative max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-1 text-black border-b-4 border-yellow-500 pb-2 inline-block">Riwayat Aktivitas
        </h1>
        <p class="text-gray-600">Terakhir login/menilai</p>

        <div class="bg-white mt-6 rounded-lg shadow-md overflow-hidden">
            <div class="flex items-center p-6" style="background-color: #F8C82A;">
                <div class="flex items-center text-gray-800">
                    <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="ml-2">
                        <h2 class="text-xl font-bold text-gray-900">Riwayat Aktivitas</h2>
                        <p class="text-sm text-gray-700">Semua aktivitas yang telah Anda lakukan</p>
                    </div>
                </div>

                <div class="ml-auto flex flex-wrap gap-2">
                    <div class="relative">
                        <input type="text" placeholder="Cari aktivitas..."
                            class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 w-64 focus:outline-none focus:ring-2 focus:ring-blue-800">
                        <svg class="w-5 h-5 absolute left-3 top-3 text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <button
                        class="px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                    </button>

                    <div class="relative">
                        <button
                            class="flex items-center px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700">
                            <span>Semua Aktivitas</span>
                            <svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>

                    <button
                        class="px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700 flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-200" style="background-color: #00549D;">
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">No</th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Aktivitas
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Detail
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">
                                <div class="flex items-center">
                                    Tanggal & Waktu
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="py-3 px-6 text-left text-white font-medium text-sm">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">1</td>
                            <td class="py-4 px-6 text-sm font-medium text-green-700">Penilaian</td>
                            <td class="py-4 px-6 text-sm text-gray-900">Menilai Dewi Sartika (Kompetensi C)</td>
                            <td class="py-4 px-6 text-sm text-gray-500">5 Apr 2023, 14:30</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">2</td>
                            <td class="py-4 px-6 text-sm font-medium text-green-700">Login</td>
                            <td class="py-4 px-6 text-sm text-gray-900">Login ke sistem</td>
                            <td class="py-4 px-6 text-sm text-gray-500">5 Apr 2023, 09:15</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">3</td>
                            <td class="py-4 px-6 text-sm font-medium text-green-700">Penilaian</td>
                            <td class="py-4 px-6 text-sm text-gray-900">Menilai Ahmad Dahlan (Kompetensi B)</td>
                            <td class="py-4 px-6 text-sm text-gray-500">3 Apr 2023, 11:45</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">4</td>
                            <td class="py-4 px-6 text-sm font-medium text-green-700">Download</td>
                            <td class="py-4 px-6 text-sm text-gray-900">Download laporan penilaian</td>
                            <td class="py-4 px-6 text-sm text-gray-500">2 Apr 2023, 16:20</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">5</td>
                            <td class="py-4 px-6 text-sm font-medium text-green-700">Penilaian</td>
                            <td class="py-4 px-6 text-sm text-gray-900">Menilai Kartini (Kompetensi C)</td>
                            <td class="py-4 px-6 text-sm text-gray-500">1 Apr 2023, 10:30</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">6</td>
                            <td class="py-4 px-6 text-sm font-medium text-green-700">Login</td>
                            <td class="py-4 px-6 text-sm text-gray-900">Login ke sistem</td>
                            <td class="py-4 px-6 text-sm text-gray-500">1 Apr 2023, 08:45</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">7</td>
                            <td class="py-4 px-6 text-sm font-medium text-green-700">Penilaian</td>
                            <td class="py-4 px-6 text-sm text-gray-900">Menilai Sukarno (Kompetensi B)</td>
                            <td class="py-4 px-6 text-sm text-gray-500">28 Mar 2023, 13:15</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-full text-xs font-medium">Selesai</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-50">
                            <td class="py-4 px-6 text-sm font-medium" style="color: #0083D0;">8</td>
                            <td class="py-4 px-6 text-sm font-medium text-green-700">Download</td>
                            <td class="py-4 px-6 text-sm text-gray-900">Download template penilaian</td>
                            <td class="py-4 px-6 text-sm text-gray-500">27 Mar 2023, 15:40</td>
                            <td class="py-4 px-6 text-sm">
                                <span
                                    class="px-3 py-1 bg-blue-800 text-white rounded-full text-xs font-medium">Berhasil</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between p-6">
                <div class="text-sm text-gray-700">
                    Menampilkan 1-8 dari 45 aktivitas
                </div>
                <div class="flex space-x-1">
                    <button
                        class="px-3 py-1 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-100">
                        Sebelumnya
                    </button>
                    <button class="px-3 py-1 text-sm text-white bg-blue-800 border border-blue-800 rounded-md">
                        1
                    </button>
                    <button
                        class="px-3 py-1 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-blue-800 hover:text-white">
                        2
                    </button>
                    <button
                        class="px-3 py-1 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-blue-800 hover:text-white">
                        3
                    </button>
                    <button
                        class="px-3 py-1 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-blue-800 hover:text-white">
                        4
                    </button>
                    <button
                        class="px-3 py-1 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-100">
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>

        <button
            class="fixed bottom-5 right-5 bg-blue-800 text-white p-3 rounded-full shadow-lg transform transition-all duration-300 hover:bg-blue-700 hover:scale-110 focus:outline-none hidden md:block">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 11l7-7 7 7M5 19l7-7 7 7" />
            </svg>
        </button>
    </section>
    {{-- End Riwayat Aktifitas --}}

    {{-- Progress Penilaian --}}
    <section class="max-w-7xl mx-auto px-4 py-8 bg-white">
        <div class="mb-8 transform transition hover:scale-102 duration-300">
            <h1
                class="text-3xl font-bold text-black flex items-center border-b-4 border-yellow-500 pb-2 inline-block">
                Progress Penilaian
            </h1>
            <p class="text-gray-600 text-sm mt-1">Progress bar tugas penilaian Anda</p>
        </div>

        <!-- Progress Keseluruhan Card -->
        <div
            class="bg-white rounded-xl shadow-md p-6 mb-6 hover:shadow-xl transition-all duration-300 border border-gray-100">
            <h2 class="text-xl font-bold text-gray-900 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="#00549D">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                </svg>
                Progress Keseluruhan
            </h2>
            <p class="text-gray-600 text-sm mt-1 ml-7">16 dari 24 tugas selesai (66.7%)</p>


            <div class="mt-4 w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                <div class="bg-gradient-to-r from-yellow-500 to-blue-800 h-3 rounded-full transition-all duration-1000 ease-out animate-pulse-subtle"
                    style="width: 66.7%"></div>
            </div>

            <div class="flex justify-between text-xs text-gray-500 mt-1 px-1">
                <span>0%</span>
                <span>50%</span>
                <span>100%</span>
            </div>

            <!-- Category Progress -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                <!-- Category B -->
                <div
                    class="border border-gray-200 rounded-lg p-5 hover:border-blue-800 transition-all duration-300 hover:shadow-md transform hover:-translate-y-1 cursor-pointer bg-white">
                    <div class="flex justify-between items-center">
                        <span class="font-medium text-gray-900 flex items-center">
                            <span class="h-3 w-3 bg-blue-800 rounded-full mr-2"></span>
                            Kategori B
                        </span>
                        <span class="bg-blue-800 text-white text-xs px-3 py-1 rounded-full shadow-sm">66.7%</span>
                    </div>
                    <p class="text-gray-600 text-sm mt-2 ml-5">8 dari 12 tugas selesai</p>
                    <div class="mt-3 w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
                        <div class="bg-blue-800 h-2.5 rounded-full transition-all duration-700 ease-in-out"
                            style="width: 66.7%"></div>
                    </div>
                </div>

                <!-- Category C -->
                <div
                    class="border border-gray-200 rounded-lg p-5 hover:border-yellow-500 transition-all duration-300 hover:shadow-md transform hover:-translate-y-1 cursor-pointer bg-white">
                    <div class="flex justify-between items-center">
                        <span class="font-medium text-gray-900 flex items-center">
                            <span class="h-3 w-3 bg-yellow-500 rounded-full mr-2"></span>
                            Kategori C
                        </span>
                        <span class="bg-yellow-500 text-white text-xs px-3 py-1 rounded-full shadow-sm">66.7%</span>
                    </div>
                    <p class="text-gray-600 text-sm mt-2 ml-5">8 dari 12 tugas selesai</p>
                    <div class="mt-3 w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
                        <div class="bg-yellow-500 h-2.5 rounded-full transition-all duration-700 ease-in-out"
                            style="width: 66.7%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Terbaru Card -->
        <div
            class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition-all duration-300 border border-gray-100">
            <div class="flex items-center"
                style="background-color: #F8C82A; margin: -24px; margin-bottom: 16px; padding: 24px;">
                <div class="flex items-center text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="ml-2">
                        <h2 class="text-xl font-bold text-gray-900">Progress Terbaru</h2>
                        <p class="text-sm text-gray-700">Status penilaian terbaru</p>
                    </div>
                </div>

                <div class="ml-auto">
                    <button
                        class="px-4 py-2 bg-blue-800 border border-blue-900 rounded-lg text-white font-medium hover:bg-blue-700 flex items-center">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Export
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="mt-6 overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-b border-gray-200" style="background-color: #00549D;">
                            <th class="py-3 px-4 text-left text-white font-medium text-sm">Asesor</th>
                            <th class="py-3 px-4 text-left text-white font-medium text-sm">Kategori</th>
                            <th class="py-3 px-4 text-left text-white font-medium text-sm">Tenggat</th>
                            <th class="py-3 px-4 text-left text-white font-medium text-sm">Status</th>
                            <th class="py-3 px-4 text-left text-white font-medium text-sm">Progress</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Ahmad Fauzi -->
                        <tr class="hover:bg-blue-50 transition-colors duration-150 cursor-pointer">
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-gray-900">Ahmad Fauzi</p>
                                    <p class="text-gray-500 text-xs">ASE-001</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span
                                    class="bg-blue-800 text-white text-xs px-3 py-1 rounded-full shadow-sm hover:bg-blue-700 transition-colors duration-300">Kategori
                                    B</span>
                            </td>
                            <td class="py-4 px-4 text-gray-700">2023-04-20</td>
                            <td class="py-4 px-4">
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full shadow-sm flex items-center w-fit">
                                    <span class="h-2 w-2 bg-yellow-500 rounded-full mr-1 animate-pulse"></span>
                                    Menunggu
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    <div class="w-24 bg-gray-200 rounded-full h-2.5 mr-2 overflow-hidden">
                                        <div class="bg-blue-800 h-2.5 rounded-full transition-all duration-1000 ease-out"
                                            style="width: 0%"></div>
                                    </div>
                                    <span class="text-gray-700 text-sm">0%</span>
                                </div>
                            </td>
                        </tr>

                        <!-- Siti Nurhaiiza -->
                        <tr class="hover:bg-blue-50 transition-colors duration-150 cursor-pointer">
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-gray-900">Siti Nurhaliza</p>
                                    <p class="text-gray-500 text-xs">ASE-002</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span
                                    class="bg-yellow-500 text-white text-xs px-3 py-1 rounded-full shadow-sm hover:bg-yellow-400 transition-colors duration-300">Kategori
                                    C</span>
                            </td>
                            <td class="py-4 px-4 text-gray-700">2023-04-18</td>
                            <td class="py-4 px-4">
                                <span
                                    class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full shadow-sm flex items-center w-fit">
                                    <span class="h-2 w-2 bg-green-500 rounded-full mr-1"></span>
                                    Selesai
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    <div class="w-24 bg-gray-200 rounded-full h-2.5 mr-2 overflow-hidden">
                                        <div class="bg-green-500 h-2.5 rounded-full transition-all duration-1000 ease-out"
                                            style="width: 100%"></div>
                                    </div>
                                    <span class="text-gray-700 text-sm">100%</span>
                                </div>
                            </td>
                        </tr>

                        <!-- Budi Santoso -->
                        <tr class="hover:bg-blue-50 transition-colors duration-150 cursor-pointer">
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-gray-900">Budi Santoso</p>
                                    <p class="text-gray-500 text-xs">ASE-003</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span
                                    class="bg-blue-800 text-white text-xs px-3 py-1 rounded-full shadow-sm hover:bg-blue-700 transition-colors duration-300">Kategori
                                    B</span>
                            </td>
                            <td class="py-4 px-4 text-gray-700">2023-04-22</td>
                            <td class="py-4 px-4">
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full shadow-sm flex items-center w-fit">
                                    <span class="h-2 w-2 bg-yellow-500 rounded-full mr-1 animate-pulse"></span>
                                    Menunggu
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    <div class="w-24 bg-gray-200 rounded-full h-2.5 mr-2 overflow-hidden">
                                        <div class="bg-blue-800 h-2.5 rounded-full transition-all duration-1000 ease-out"
                                            style="width: 0%"></div>
                                    </div>
                                    <span class="text-gray-700 text-sm">0%</span>
                                </div>
                            </td>
                        </tr>

                        <!-- Dewi Kartika -->
                        <tr class="hover:bg-blue-50 transition-colors duration-150 cursor-pointer">
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-gray-900">Dewi Kartika</p>
                                    <p class="text-gray-500 text-xs">ASE-004</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span
                                    class="bg-yellow-500 text-white text-xs px-3 py-1 rounded-full shadow-sm hover:bg-yellow-400 transition-colors duration-300">Kategori
                                    C</span>
                            </td>
                            <td class="py-4 px-4 text-gray-700">2023-04-16</td>
                            <td class="py-4 px-4">
                                <span
                                    class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full shadow-sm flex items-center w-fit">
                                    <span class="h-2 w-2 bg-green-500 rounded-full mr-1"></span>
                                    Selesai
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    <div class="w-24 bg-gray-200 rounded-full h-2.5 mr-2 overflow-hidden">
                                        <div class="bg-green-500 h-2.5 rounded-full transition-all duration-1000 ease-out"
                                            style="width: 100%"></div>
                                    </div>
                                    <span class="text-gray-700 text-sm">100%</span>
                                </div>
                            </td>
                        </tr>

                        <!-- Eko Prasetyo -->
                        <tr class="hover:bg-blue-50 transition-colors duration-150 cursor-pointer">
                            <td class="py-4 px-4">
                                <div>
                                    <p class="font-medium text-gray-900">Eko Prasetyo</p>
                                    <p class="text-gray-500 text-xs">ASE-005</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span
                                    class="bg-blue-800 text-white text-xs px-3 py-1 rounded-full shadow-sm hover:bg-blue-700 transition-colors duration-300">Kategori
                                    B</span>
                            </td>
                            <td class="py-4 px-4 text-gray-700">2023-04-25</td>
                            <td class="py-4 px-4">
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full shadow-sm flex items-center w-fit">
                                    <span class="h-2 w-2 bg-yellow-500 rounded-full mr-1 animate-pulse"></span>
                                    Menunggu
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center">
                                    <div class="w-24 bg-gray-200 rounded-full h-2.5 mr-2 overflow-hidden">
                                        <div class="bg-blue-800 h-2.5 rounded-full transition-all duration-1000 ease-out"
                                            style="width: 0%"></div>
                                    </div>
                                    <span class="text-gray-700 text-sm">0%</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <style>
            /* Custom animations */
            @keyframes pulse-subtle {

                0%,
                100% {
                    opacity: 1;
                }

                50% {
                    opacity: 0.8;
                }
            }

            .animate-pulse-subtle {
                animation: pulse-subtle 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }

            .hover\:scale-102:hover {
                transform: scale(1.02);
            }
        </style>
    </section>
    {{-- End Progress Penilaian --}}

    {{-- Download Nilai --}}
    <section class="max-w-7xl mx-auto p-4">
        <h1 class="text-2xl font-bold text-blue-800 mb-4 border-b-4 border-yellow-500 pb-2 inline-block">Download
            Nilai</h1>

        <!-- Tabs -->
        <div class="bg-blue-50 rounded-t-lg">
            <div class="flex">
                <button id="tab-individual"
                    class="flex-1 py-4 text-center font-medium bg-blue-800 text-white rounded-t-lg">
                    Nilai Individual
                </button>
                <button id="tab-laporan" class="flex-1 py-4 text-center text-gray-700">
                    Laporan
                </button>
            </div>
        </div>

        <!-- Content Section -->
        <div class="bg-white p-6 rounded-b-lg shadow">
            <!-- Nilai Individual View -->
            <div id="view-individual">
                <div class="mb-6">
                    <h2 class="text-xl font-bold mb-1">Download Nilai Individual</h2>
                    <p class="text-gray-600 text-sm">Download nilai asesi dalam format PDF atau Excel</p>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="relative">
                        <select
                            class="appearance-none bg-white border border-gray-300 rounded-md py-2 px-4 pr-8 w-56">
                            <option>Semua Kategori</option>
                            <option>Kategori A</option>
                            <option>Kategori B</option>
                            <option>Kategori C</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative">
                        <select
                            class="appearance-none bg-white border border-gray-300 rounded-md py-2 px-4 pr-8 w-56">
                            <option>April 2023</option>
                            <option>Maret 2023</option>
                            <option>Februari 2023</option>
                            <option>Januari 2023</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex gap-2 ml-auto">
                        <button class="flex items-center px-4 py-2 border border-gray-300 rounded bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            Cetak
                        </button>
                        <button class="flex items-center px-4 py-2 border border-gray-300 rounded bg-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            PDF
                        </button>
                        <button
                            class="flex items-center px-4 py-2 border border-blue-900 rounded bg-blue-800 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Excel
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-600">
                                <th class="pb-3 pr-4">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-blue-800 focus:ring-blue-500">
                                </th>
                                <th class="pb-3">Nama Asesi</th>
                                <th class="pb-3">Kategori</th>
                                <th class="pb-3">Tanggal Penilaian</th>
                                <th class="pb-3">Nilai</th>
                                <th class="pb-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr class="border-t border-gray-100">
                                <td class="py-4 pr-4">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-blue-800 focus:ring-blue-500">
                                </td>
                                <td class="py-4 font-medium">Budi Santoso</td>
                                <td class="py-4">
                                    <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs">Kategori
                                        B</span>
                                </td>
                                <td class="py-4">12 Apr 2023</td>
                                <td class="py-4 text-blue-600 font-medium">85</td>
                                <td class="py-4">
                                    <div class="flex justify-end gap-2">
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <span class="ml-1">PDF</span>
                                        </button>
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span class="ml-1">Excel</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr class="border-t border-gray-100">
                                <td class="py-4 pr-4">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-blue-800 focus:ring-blue-500">
                                </td>
                                <td class="py-4 font-medium">Siti Rahayu</td>
                                <td class="py-4">
                                    <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs">Kategori
                                        C</span>
                                </td>
                                <td class="py-4">15 Apr 2023</td>
                                <td class="py-4 text-yellow-500 font-medium">78</td>
                                <td class="py-4">
                                    <div class="flex justify-end gap-2">
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <span class="ml-1">PDF</span>
                                        </button>
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span class="ml-1">Excel</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr class="border-t border-gray-100">
                                <td class="py-4 pr-4">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-blue-800 focus:ring-blue-500">
                                </td>
                                <td class="py-4 font-medium">Agus Wijaya</td>
                                <td class="py-4">
                                    <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs">Kategori
                                        B</span>
                                </td>
                                <td class="py-4">18 Apr 2023</td>
                                <td class="py-4 text-purple-600 font-medium">92</td>
                                <td class="py-4">
                                    <div class="flex justify-end gap-2">
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <span class="ml-1">PDF</span>
                                        </button>
                                        <button class="px-3 py-2 border border-gray-300 rounded flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span class="ml-1">Excel</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- More rows... -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Laporan View -->
            <div id="view-laporan" class="hidden">
                <div class="mb-6">
                    <h2 class="text-xl font-bold mb-1">Laporan Penilaian</h2>
                    <p class="text-gray-600 text-sm">Download laporan penilaian bulanan dan kuartalan</p>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <div class="relative">
                        <select
                            class="appearance-none bg-white border border-gray-300 rounded-md py-2 px-4 pr-8 w-56">
                            <option>Semua Tipe</option>
                            <option>Bulanan</option>
                            <option>Kuartal</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative">
                        <select
                            class="appearance-none bg-white border border-gray-300 rounded-md py-2 px-4 pr-8 w-56">
                            <option>2023</option>
                            <option>2022</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <button
                        class="flex items-center gap-2 px-4 py-2 ml-auto bg-blue-800 text-white rounded border border-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        Generate Laporan Baru
                    </button>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-600 border-b border-gray-100">
                                <th class="pb-3">Nama Laporan</th>
                                <th class="pb-3">Tipe</th>
                                <th class="pb-3">Format</th>
                                <th class="pb-3">Tanggal Dibuat</th>
                                <th class="pb-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 font-medium">Laporan Bulanan April 2023</td>
                                <td class="py-4">Bulanan</td>
                                <td class="py-4">
                                    <span
                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Excel</span>
                                </td>
                                <td class="py-4">30 Apr 2023</td>
                                <td class="py-4 text-right">
                                    <button class="inline-flex items-center gap-1 text-blue-800 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 2 -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 font-medium">Laporan Kuartal 1 2023</td>
                                <td class="py-4">Kuartal</td>
                                <td class="py-4">
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">PDF</span>
                                </td>
                                <td class="py-4">31 Mar 2023</td>
                                <td class="py-4 text-right">
                                    <button class="inline-flex items-center gap-1 text-blue-800 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 font-medium">Laporan Bulanan Maret 2023</td>
                                <td class="py-4">Bulanan</td>
                                <td class="py-4">
                                    <span
                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Excel</span>
                                </td>
                                <td class="py-4">31 Mar 2023</td>
                                <td class="py-4 text-right">
                                    <button class="inline-flex items-center gap-1 text-blue-800 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 4 -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 font-medium">Laporan Bulanan Februari 2023</td>
                                <td class="py-4">Bulanan</td>
                                <td class="py-4">
                                    <span
                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Excel</span>
                                </td>
                                <td class="py-4">28 Feb 2023</td>
                                <td class="py-4 text-right">
                                    <button class="inline-flex items-center gap-1 text-blue-800 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </button>
                                </td>
                            </tr>

                            <!-- Row 5 -->
                            <tr class="border-b border-gray-100">
                                <td class="py-4 font-medium">Laporan Bulanan Januari 2023</td>
                                <td class="py-4">Bulanan</td>
                                <td class="py-4">
                                    <span
                                        class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">Excel</span>
                                </td>
                                <td class="py-4">31 Jan 2023</td>
                                <td class="py-4 text-right">
                                    <button class="inline-flex items-center gap-1 text-blue-800 hover:text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Download
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('tab-individual').addEventListener('click', function() {

                this.classList.add('bg-blue-800', 'text-white');
                document.getElementById('tab-laporan').classList.remove('bg-blue-800', 'text-white');


                document.getElementById('view-individual').classList.remove('hidden');
                document.getElementById('view-laporan').classList.add('hidden');
            });

            document.getElementById('tab-laporan').addEventListener('click', function() {

                this.classList.add('bg-blue-800', 'text-white');
                document.getElementById('tab-individual').classList.remove('bg-blue-800', 'text-white');


                document.getElementById('view-individual').classList.add('hidden');
                document.getElementById('view-laporan').classList.remove('hidden');
            });
        </script>
    </section>
    {{-- End Download Nilai --}}

    {{-- Profile Setting --}}
    <section class="max-w-7xl mx-auto px-4 py-8 bg-gradient-to-b">
        <h1 class="text-2xl font-bold text-blue-800 mb-6">Profile Setting</h1>

        <!-- Navigation Tabs -->
        <div class="flex mb-6">
            <button id="tab-profil"
                class="flex-1 py-3 font-medium text-white bg-blue-800 rounded-lg">Profil</button>
            <button id="tab-keamanan" class="flex-1 py-3 font-medium text-gray-600 ml-4">Keamanan</button>
        </div>

        <!-- Profile Information Section -->
        <section id="content-profil" class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-xl font-bold mb-2">Informasi Profil</h2>
            <p class="text-gray-600 mb-6">Update informasi profil Anda</p>

            <!-- Profile Header with Image -->
            <div class="flex items-center mb-8">
                <div class="relative">
                    <div class="w-20 h-20 rounded-full bg-gray-200 overflow-hidden">
                        <!-- Profile image placeholder -->
                    </div>
                    <button class="absolute bottom-0 right-0 bg-yellow-500 text-white rounded-full p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
                <div class="ml-6">
                    <h3 class="text-lg font-bold">Hamas</h3>
                    <div class="flex space-x-2 mt-1">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Asesor
                            Senior</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">ID: AS12345</span>
                    </div>
                    <p class="text-gray-500 text-sm mt-2">Bergabung sejak 12 Januari 2020</p>
                </div>
            </div>

            <!-- Form Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name Field -->
                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" id="fullname" class="w-full border border-gray-300 rounded-lg p-2"
                        value="Ahmad Subarjo">
                </div>

                <!-- ID Field -->
                <div>
                    <label for="id" class="block text-sm font-medium text-gray-700 mb-1">ID Asesor</label>
                    <input type="text" id="id" class="w-full border border-gray-300 rounded-lg p-2"
                        value="AS12345">
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" class="w-full border border-gray-300 rounded-lg p-2"
                        value="ahmad.subarjo@example.com">
                </div>

                <!-- Phone Field -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                    <input type="tel" id="phone" class="w-full border border-gray-300 rounded-lg p-2"
                        value="081234567890">
                </div>

                <!-- Address Field -->
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <input type="text" id="address" class="w-full border border-gray-300 rounded-lg p-2"
                        value="Jl. Contoh No. 123, Jakarta">
                </div>

                <!-- City Field -->
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Kota</label>
                    <input type="text" id="city" class="w-full border border-gray-300 rounded-lg p-2"
                        value="Jakarta">
                </div>

                <!-- Province Field -->
                <div>
                    <label for="province" class="block text-sm font-medium text-gray-700 mb-1">Provinsi</label>
                    <input type="text" id="province" class="w-full border border-gray-300 rounded-lg p-2"
                        value="DKI Jakarta">
                </div>

                <!-- Postal Code Field -->
                <div class="md:col-span-2">
                    <label for="postal" class="block text-sm font-medium text-gray-700 mb-1">Kode Pos</label>
                    <input type="text" id="postal" class="w-full border border-gray-300 rounded-lg p-2"
                        value="12345">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 text-right">
                <button
                    class="bg-blue-800 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg flex items-center justify-center ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Edit Profil
                </button>
            </div>
        </section>

        <!-- Security Section -->
        <section id="content-keamanan" class="bg-white rounded-lg shadow-sm p-6 mb-6 hidden">
            <h2 class="text-xl font-bold mb-2">Keamanan Akun</h2>
            <p class="text-gray-600 mb-6">Update password dan pengaturan keamanan</p>

            <!-- Password Change Section -->
            <div class="mb-8">
                <h3 class="text-lg font-bold mb-4">Ubah Password</h3>

                <div class="space-y-4">
                    <!-- Current Password -->
                    <div>
                        <label for="current-password" class="block text-sm font-medium text-gray-700 mb-1">Password
                            Saat Ini</label>
                        <input type="password" id="current-password"
                            class="w-full border border-gray-300 rounded-lg p-2">
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="new-password" class="block text-sm font-medium text-gray-700 mb-1">Password
                            Baru</label>
                        <input type="password" id="new-password"
                            class="w-full border border-gray-300 rounded-lg p-2">
                    </div>

                    <!-- Confirm New Password -->
                    <div>
                        <label for="confirm-password"
                            class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" id="confirm-password"
                            class="w-full border border-gray-300 rounded-lg p-2">
                    </div>
                </div>
            </div>

            <!-- Other Security Settings -->
            <div>
                <h3 class="text-lg font-bold mb-4">Pengaturan Keamanan Lainnya</h3>

                <!-- Login Notification -->
                <div class="border border-gray-200 rounded-lg p-4 mb-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-medium">Notifikasi Login</h4>
                            <p class="text-sm text-gray-500">Dapatkan notifikasi saat akun Anda diakses dari perangkat
                                baru</p>
                        </div>
                        <input type="checkbox" checked class="h-5 w-5 text-blue-800 rounded">
                    </div>
                </div>

                <!-- 2 Factor Authentication -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-medium">Verifikasi Dua Langkah</h4>
                            <p class="text-sm text-gray-500">Tingkatkan keamanan akun dengan verifikasi dua langkah
                            </p>
                        </div>
                        <input type="checkbox" class="h-5 w-5 text-blue-800 rounded">
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="mt-6 text-right">
                <button
                    class="bg-blue-800 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg flex items-center ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </section>

        <script>
            const tabProfil = document.getElementById('tab-profil');
            const tabKeamanan = document.getElementById('tab-keamanan');
            const contentProfil = document.getElementById('content-profil');
            const contentKeamanan = document.getElementById('content-keamanan');


            tabProfil.addEventListener('click', function() {

                tabProfil.classList.add('text-white', 'bg-blue-800');
                tabProfil.classList.remove('text-gray-600');
                tabKeamanan.classList.remove('text-white', 'bg-blue-800');
                tabKeamanan.classList.add('text-gray-600');


                contentProfil.classList.remove('hidden');
                contentKeamanan.classList.add('hidden');
            });

            tabKeamanan.addEventListener('click', function() {

                tabKeamanan.classList.add('text-white', 'bg-blue-800');
                tabKeamanan.classList.remove('text-gray-600');
                tabProfil.classList.remove('text-white', 'bg-blue-800');
                tabProfil.classList.add('text-gray-600');


                contentKeamanan.classList.remove('hidden');
                contentProfil.classList.add('hidden');
            });
        </script>
    </section>
    {{-- End Profile Setting --}}

    {{-- Footer --}}
    <footer class="bg-[#0D3B66] text-white py-10 relative">
        <!-- Border Top -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500">
        </div>

        <div class="absolute inset-0 opacity-5">
            <div
                class="w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMzLjMxNCAwIDYtMi42ODYgNi02cy0yLjY4Ni02LTYtNmMtMy4zMTQgMC02IDIuNjg2LTYgNnMyLjY4NiA2IDYgNnptMCAwIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuNSIvPjxwYXRoIGQ9Ik0yNCAzNmMzLjMxNCAwIDYtMi42ODYgNi02cy0yLjY4Ni02LTYtNmMtMy4zMTQgMC02IDIuNjg2LTYgNnMyLjY4NiA2IDYgNnptMCAwIiBzdHJva2U9IiNmZmYiIHN0cm9rZS1vcGFjaXR5PSIuNSIvPjwvZz48L3N2Zz4=')]">
            </div>
        </div>

        <div class="container max-w-6xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- TLC Program - kiri -->
                <div class="space-y-3">
                    <h2 class="text-xl font-bold mb-3 pb-2 border-b-2 border-orange-400 inline-block">
                        TLC Program
                    </h2>
                    <p class="text-gray-300 leading-relaxed mb-4 text-sm">
                        Program sertifikasi untuk memberdayakan pendidik dengan pengetahuan dan
                        keterampilan mengajar yang efektif.
                    </p>
                    <div class="flex space-x-4 mt-3">
                        <a href="#" class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="#" class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                        <a href="#" class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="#" class="text-white hover:text-orange-400 transition-colors">
                            <i class="fab fa-linkedin-in text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Tautan Cepat - Middle -->
                <div class="md:flex md:justify-center">
                    <div class="space-y-3">
                        <h2 class="text-xl font-bold mb-3 pb-2 border-b-2 border-orange-400 inline-block">
                            Tautan Cepat
                        </h2>
                        <ul class="space-y-2 text-sm">
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Tentang TLC
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Manfaat
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Kurikulum
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Paket Harga
                                    </span>
                                </a>
                            </li>
                            <li class="group">
                                <a href="#"
                                    class="flex items-center text-gray-300 hover:text-orange-400 transition-colors duration-300">
                                    <span
                                        class="transform group-hover:translate-x-2 transition-transform duration-200">
                                        <i class="fas fa-chevron-right mr-2 text-orange-400 text-sm"></i>
                                        Pendaftaran
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Kontak - Kanan -->
                <div class="md:text-right space-y-3">
                    <h2 class="text-xl font-bold mb-3 pb-2 border-b-2 border-orange-400 md:ml-auto md:inline-block">
                        Kontak
                    </h2>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start md:justify-end group">
                            <i
                                class="fas fa-map-marker-alt text-orange-400 text-lg mt-1 md:order-2 md:ml-3 group-hover:animate-bounce"></i>
                            <span class="ml-3 md:ml-0 text-gray-300 md:text-right md:order-1">
                                Jl. Pendidikan No. 123, Jakarta Pusat, Indonesia
                            </span>
                        </li>
                        <li class="flex items-center md:justify-end group">
                            <i
                                class="fas fa-phone-alt text-orange-400 text-lg md:order-2 md:ml-3 group-hover:animate-bounce"></i>
                            <span
                                class="ml-3 md:ml-0 text-gray-300 hover:text-orange-400 transition-colors md:order-1">
                                <a href="tel:+6221123456789">+62 21 1234 5678</a>
                            </span>
                        </li>
                        <li class="flex items-center md:justify-end group">
                            <i
                                class="fas fa-envelope text-orange-400 text-lg md:order-2 md:ml-3 group-hover:animate-bounce"></i>
                            <span
                                class="ml-3 md:ml-0 text-gray-300 hover:text-orange-400 transition-colors md:order-1">
                                <a href="mailto:info@tlcprogram.id">info@tlcprogram.id</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 pt-4 border-t border-gray-500 text-center text-gray-400 text-sm">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p>© 2025 Teaching and Learning Certification Program. All rights reserved.</p>
                    <div class="mt-2 md:mt-0">
                        <a href="#"
                            class="text-gray-400 hover:text-orange-400 mx-2 transition-colors">Kebijakan Privasi</a>
                        <span class="mx-2">|</span>
                        <a href="#" class="text-gray-400 hover:text-orange-400 mx-2 transition-colors">Syarat
                            & Ketentuan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- FontAwesome Script untuk Icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
    </footer>
    {{-- end Footer --}}

    {{-- Logout --}}
    {{-- <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition">
            Logout
        </button>
    </form> --}}
    {{-- End Logiut --}}

</body>

</html>
