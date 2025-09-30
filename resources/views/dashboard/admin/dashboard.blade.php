@extends('layouts.adminDashboard')
@section('title', 'Admin Dashboard')

@section('content')

    <!-- Stats Overview Cards with Standard Size -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 mt-10">
        <!-- Asesi Card -->
        <div
            class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div
                class="absolute inset-0 bg-gradient-to-br from-[#1D4E89] to-[#1D4E89] opacity-0 group-hover:opacity-5 transition-opacity duration-300">
            </div>
            <div class="relative">
                <div class="p-4 bg-gradient-to-br from-[#1D4E89] via-[#1D4E89] to-[#2563eb]">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-1">Total Asesi</h3>
                            <div class="w-8 h-0.5 bg-white/40 rounded-full"></div>
                        </div>
                        <div class="bg-white/25 backdrop-blur-sm p-2 rounded-lg border border-white/20">
                            <i class="fas fa-user-graduate text-white text-lg"></i>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-gradient-to-b from-white to-blue-50">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-gray-800">{{ $asesi }}</span>
                        {{-- <div class="text-right">
                        <div class="text-green-500 text-xs font-semibold flex items-center">
                            <i class="fas fa-arrow-up text-xs mr-1"></i>
                            +12%
                        </div>
                        <div class="text-xs text-gray-500">vs bulan lalu</div>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Asesor Card -->
        <div
            class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div
                class="absolute inset-0 bg-gradient-to-br from-[#E76F51] to-[#E76F51] opacity-0 group-hover:opacity-5 transition-opacity duration-300">
            </div>
            <div class="relative">
                <div class="p-4 bg-gradient-to-br from-[#E76F51] via-[#E76F51] to-[#ea580c]">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-1">Total Asesor</h3>
                            <div class="w-8 h-0.5 bg-white/40 rounded-full"></div>
                        </div>
                        <div class="bg-white/25 backdrop-blur-sm p-2 rounded-lg border border-white/20">
                            <i class="fas fa-chalkboard-teacher text-white text-lg"></i>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-gradient-to-b from-white to-orange-50">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-gray-800">{{ $asesor }}</span>
                        {{-- <div class="text-right">
                        <div class="text-green-500 text-xs font-semibold flex items-center">
                            <i class="fas fa-arrow-up text-xs mr-1"></i>
                            +8%
                        </div>
                        <div class="text-xs text-gray-500">vs bulan lalu</div>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Card -->
        <div
            class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div
                class="absolute inset-0 bg-gradient-to-br from-[#1D4E89] to-[#E76F51] opacity-0 group-hover:opacity-5 transition-opacity duration-300">
            </div>
            <div class="relative">
                <div class="p-4 bg-gradient-to-br from-[#1D4E89] via-[#1D4E89] to-[#2563eb]">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-1">Total Admin</h3>
                            <div class="w-8 h-0.5 bg-white/40 rounded-full"></div>
                        </div>
                        <div class="bg-white/25 backdrop-blur-sm p-2 rounded-lg border border-white/20">
                            <i class="fas fa-user-shield text-white text-lg"></i>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-gradient-to-b from-white to-blue-50">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-gray-800">{{ $admins }}</span>
                        {{-- <div class="text-right">
                        <div class="text-[#1D4E89] text-xs font-semibold flex items-center">
                            <i class="fas fa-minus text-xs mr-1"></i>
                            Stabil
                        </div>
                        <div class="text-xs text-gray-500">vs bulan lalu</div>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">
        <!-- Certification Statistics -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-4 bg-[#1D4E89]">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-chart-pie mr-2"></i>
                    Status Sertifikasi
                </h3>
            </div>
            <div class="p-4">
                <div class="flex gap-2 mb-4">
                    <button onclick="changeChartType('doughnut')"
                        class="px-4 py-2 bg-blue-500 text-white rounded">Doughnut</button>
                    <button onclick="changeChartType('bar')" class="px-4 py-2 bg-orange-500 text-white rounded">Bar</button>
                </div>
                <canvas id="userLevelChart"></canvas>
                {{-- <canvas id="userLevelChart" width="100" height="100"></canvas> --}}

                <div class="mt-6 pt-4 border-t border-gray-200">
                    <h4 class="text-sm font-semibold text-gray-800 mb-3">Distribusi Level</h4>
                    <div class="grid grid-cols-3 gap-2 text-center">
                        <div class="bg-blue-50 p-2 rounded-lg">
                            <span class="block text-xl font-bold text-green-600">{{ $levelCount['A'] }} User</span>
                            <span class="text-xs text-gray-600">Level A</span>
                        </div>
                        <div class="bg-purple-50 p-2 rounded-lg">
                            <span class="block text-xl font-bold text-blue-500">{{ $levelCount['B'] }} User</span>
                            <span class="text-xs text-gray-600">Level B</span>
                        </div>
                        <div class="bg-green-50 p-2 rounded-lg">
                            <span class="block text-xl font-bold text-pink-500">{{ $levelCount['C'] }} User</span>
                            <span class="text-xs text-gray-600">Level C</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const levelData = {
                labels: ['Belum Terdaftar', 'Level A', 'Level B', 'Level C'],
                datasets: [{
                    label: 'Distribusi Level Asesi',
                    data: [
                        {{ $levelCount['userLevelNone'] }},
                        {{ $levelCount['A'] }},
                        {{ $levelCount['B'] }},
                        {{ $levelCount['C'] }}
                    ],
                    backgroundColor: [
                        '#9CA3AF', // gray
                        '#4ADE80', // green
                        '#60A5FA', // blue
                        '#F472B6' // pink
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            };

            let currentChartType = 'doughnut';
            let chartInstance = null;

            function renderChart(type) {
                const ctx = document.getElementById('userLevelChart').getContext('2d');

                // Destroy chart sebelumnya kalau ada
                if (chartInstance) {
                    chartInstance.destroy();
                }

                chartInstance = new Chart(ctx, {
                    type: type,
                    data: levelData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const total = {{ array_sum($levelCount) }};
                                        const value = context.raw;
                                        const percent = ((value / total) * 100).toFixed(1);
                                        return `${context.label}: ${value} (${percent}%)`;
                                    }
                                }
                            }
                        }
                    }
                });

                currentChartType = type;
            }

            function changeChartType(type) {
                renderChart(type);
            }

            // Render chart default saat load
            document.addEventListener('DOMContentLoaded', function() {
                renderChart(currentChartType);
            });
        </script>

        <!-- User Table -->
        <div class="xl:col-span-2 bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-4 bg-[#1D4E89]">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-users mr-2"></i>
                    Data Pengguna Terbaru
                </h3>
            </div>
            <div class="p-4">
                @livewire('asesi-table')
            </div>
        </div>
    </div>

    <!-- Bundling Modal -->
    <div id="bundlingModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center">
        <div
            class="relative p-8 bg-white w-full max-w-md mx-auto rounded-lg shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Bundling Options</h3>
                <button id="closeBundlingModal" class="text-gray-400 hover:text-gray-600">
                    <span class="sr-only">Close modal</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="py-4">
                <p class="text-sm text-gray-500 mb-4">Here you can manage your bundling options. Add new bundles or modify
                    existing ones.</p>
                <!-- Bundling Form/Content goes here -->
                <form>
                    <div class="mb-4">
                        <label for="bundleName" class="block text-sm font-medium text-gray-700">Bundle Name</label>
                        <input type="text" id="bundleName" name="bundleName"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="e.g., Basic Certification Bundle">
                    </div>
                    <div class="mb-4">
                        <label for="bundlePrice" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" id="bundlePrice" name="bundlePrice"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="e.g., 150000">
                    </div>
                    <div class="mb-4">
                        <label for="bundleDescription" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="bundleDescription" name="bundleDescription" rows="3"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Brief description of the bundle"></textarea>
                    </div>
                    <!-- Add more fields as needed for bundling, e.g., included items -->
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex justify-end pt-4 border-t border-gray-200">
                <button type="button"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 mr-2"
                    id="cancelBundlingModal">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-gradient-to-r from-[#1D4E89] to-[#E76F51] text-white rounded-md hover:from-[#2563eb] hover:to-[#ea580c] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Save Bundle
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalBtn = document.getElementById('openBundlingModal');
            const closeModalBtn = document.getElementById('closeBundlingModal');
            const cancelModalBtn = document.getElementById('cancelBundlingModal');
            const bundlingModal = document.getElementById('bundlingModal');

            openModalBtn.addEventListener('click', function() {
                bundlingModal.classList.remove('hidden');
            });

            closeModalBtn.addEventListener('click', function() {
                bundlingModal.classList.add('hidden');
            });

            cancelModalBtn.addEventListener('click', function() {
                bundlingModal.classList.add('hidden');
            });

            // Close modal when clicking outside of it
            bundlingModal.addEventListener('click', function(event) {
                if (event.target === bundlingModal) {
                    bundlingModal.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
