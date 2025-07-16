{{-- Navigation awal --}}
<!-- Navigasi -->
<div class="mt-6">
    <div class="flex gap-2 mb-4">
        <button class="bg-blue-600 text-white py-2 px-4 rounded-md flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z"
                    clip-rule="evenodd" />
            </svg>
            Data Nilai Asesi
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
</html>
