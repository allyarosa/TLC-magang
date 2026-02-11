@extends('layouts.adminDashboard')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        {{-- <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Dashboard Overview</h1>
                <p class="text-slate-500 text-sm mt-1">Pantau statistik asesi, asesor, dan sertifikasi.</p>
            </div>
            </div> --}}

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 relative overflow-hidden group hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between z-10 relative">
                    <div>
                        <p class="text-sm font-medium text-slate-500 mb-1">Total Asesi</p>
                        <h3 class="text-3xl font-bold text-slate-800">{{ $asesi }}</h3>
                        <p class="text-xs text-emerald-600 flex items-center mt-2 font-medium">
                            <span class="bg-emerald-100 px-1.5 py-0.5 rounded text-emerald-700 mr-1">Active</span>
                            Users Registered
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-user-graduate text-xl"></i>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-110 transition-transform duration-500"></div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 relative overflow-hidden group hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between z-10 relative">
                    <div>
                        <p class="text-sm font-medium text-slate-500 mb-1">Total Asesor</p>
                        <h3 class="text-3xl font-bold text-slate-800">{{ $asesor }}</h3>
                        <p class="text-xs text-orange-600 flex items-center mt-2 font-medium">
                            <span class="bg-orange-100 px-1.5 py-0.5 rounded text-orange-700 mr-1">Expert</span>
                            Certified Assessors
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 group-hover:bg-orange-600 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-chalkboard-teacher text-xl"></i>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-orange-50 rounded-full opacity-50 group-hover:scale-110 transition-transform duration-500"></div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 relative overflow-hidden group hover:shadow-md transition-all duration-300">
                <div class="flex items-center justify-between z-10 relative">
                    <div>
                        <p class="text-sm font-medium text-slate-500 mb-1">Total Admin</p>
                        <h3 class="text-3xl font-bold text-slate-800">{{ $admins }}</h3>
                        <p class="text-xs text-indigo-600 flex items-center mt-2 font-medium">
                            <span class="bg-indigo-100 px-1.5 py-0.5 rounded text-indigo-700 mr-1">System</span>
                            Administrators
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-user-shield text-xl"></i>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-indigo-50 rounded-full opacity-50 group-hover:scale-110 transition-transform duration-500"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-8">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 flex flex-col h-full">
                <div class="p-5 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-slate-800 flex items-center">
                        <i class="fas fa-chart-pie mr-2 text-slate-400"></i>
                        Status Sertifikasi
                    </h3>
                </div>
                
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div class="flex justify-center mb-6">
                        <div class="bg-slate-100 p-1 rounded-lg inline-flex">
                            <button onclick="changeChartType('doughnut')" id="btn-doughnut" 
                                class="px-4 py-1.5 text-sm font-medium rounded-md shadow-sm bg-white text-slate-800 transition-all">
                                Doughnut
                            </button>
                            <button onclick="changeChartType('bar')" id="btn-bar"
                                class="px-4 py-1.5 text-sm font-medium rounded-md text-slate-500 hover:text-slate-700 transition-all">
                                Bar
                            </button>
                        </div>
                    </div>

                    <div class="relative h-64 w-full flex items-center justify-center">
                        <canvas id="userLevelChart"></canvas>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">Detail Distribusi</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 rounded-xl bg-emerald-50/50 border border-emerald-100">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full bg-emerald-500 mr-3"></div>
                                    <span class="text-sm font-medium text-slate-700">Level A</span>
                                </div>
                                <span class="font-bold text-slate-800">{{ $levelCount['A'] }}</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-blue-50/50 border border-blue-100">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full bg-blue-500 mr-3"></div>
                                    <span class="text-sm font-medium text-slate-700">Level B</span>
                                </div>
                                <span class="font-bold text-slate-800">{{ $levelCount['B'] }}</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-purple-50/50 border border-purple-100">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full bg-purple-500 mr-3"></div>
                                    <span class="text-sm font-medium text-slate-700">Level C</span>
                                </div>
                                <span class="font-bold text-slate-800">{{ $levelCount['C'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200 flex flex-col h-full">
                <div class="p-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50 rounded-t-2xl">
                    <h3 class="text-lg font-semibold text-slate-800">
                        Data Pengguna Terbaru
                    </h3>
                    <button id="openBundlingModal" class="text-sm text-blue-600 font-medium hover:text-blue-700 transition-colors">
                        + New Bundle
                    </button>
                </div>
                <div class="p-0 overflow-hidden rounded-b-2xl">
                    <div class="w-full">
                        @livewire('asesi-table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="bundlingModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" id="modalPanel">
                    
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg font-semibold leading-6 text-slate-900" id="modal-title">Create New Bundle</h3>
                                <p class="text-sm text-slate-500 mt-2">Manage your certification packages and pricing.</p>
                                
                                <form class="mt-6 space-y-4">
                                    <div>
                                        <label for="bundleName" class="block text-sm font-medium text-slate-700">Bundle Name</label>
                                        <input type="text" id="bundleName" name="bundleName" 
                                            class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border" 
                                            placeholder="e.g. Professional Starter Pack">
                                    </div>
                                    <div>
                                        <label for="bundlePrice" class="block text-sm font-medium text-slate-700">Price (IDR)</label>
                                        <div class="relative mt-1 rounded-md shadow-sm">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <span class="text-slate-500 sm:text-sm">Rp</span>
                                            </div>
                                            <input type="number" id="bundlePrice" name="bundlePrice" 
                                                class="block w-full rounded-lg border-slate-300 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border" 
                                                placeholder="150000">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="bundleDescription" class="block text-sm font-medium text-slate-700">Description</label>
                                        <textarea id="bundleDescription" name="bundleDescription" rows="3" 
                                            class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5 px-3 border" 
                                            placeholder="What does this bundle include?"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="bg-slate-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" class="inline-flex w-full justify-center rounded-lg bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto transition-colors">
                            Save Bundle
                        </button>
                        <button type="button" id="cancelBundlingModal" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50 sm:mt-0 sm:w-auto transition-colors">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart Data & Config
        const levelData = {
            labels: ['Unregistered', 'Level A', 'Level B', 'Level C'],
            datasets: [{
                data: [
                    {{ $levelCount['userLevelNone'] }},
                    {{ $levelCount['A'] }},
                    {{ $levelCount['B'] }},
                    {{ $levelCount['C'] }}
                ],
                backgroundColor: [
                    '#E2E8F0', // Slate 200 (Unregistered)
                    '#10B981', // Emerald 500
                    '#3B82F6', // Blue 500
                    '#A855F7'  // Purple 500
                ],
                hoverBackgroundColor: [
                    '#CBD5E1',
                    '#059669', 
                    '#2563EB',
                    '#9333EA'
                ],
                borderWidth: 0,
                borderRadius: 5, // Modern rounded bars/segments
                cutout: '75%',   // Thinner Doughnut
            }]
        };

        let currentChartType = 'doughnut';
        let chartInstance = null;

        function renderChart(type) {
            const ctx = document.getElementById('userLevelChart').getContext('2d');
            
            // UI Toggle Logic
            const btnDoughnut = document.getElementById('btn-doughnut');
            const btnBar = document.getElementById('btn-bar');
            
            if(type === 'doughnut') {
                btnDoughnut.classList.add('bg-white', 'text-slate-800', 'shadow-sm');
                btnDoughnut.classList.remove('text-slate-500');
                btnBar.classList.remove('bg-white', 'text-slate-800', 'shadow-sm');
                btnBar.classList.add('text-slate-500');
            } else {
                btnBar.classList.add('bg-white', 'text-slate-800', 'shadow-sm');
                btnBar.classList.remove('text-slate-500');
                btnDoughnut.classList.remove('bg-white', 'text-slate-800', 'shadow-sm');
                btnDoughnut.classList.add('text-slate-500');
            }

            if (chartInstance) {
                chartInstance.destroy();
            }

            const options = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Hide default legend for cleaner look
                    },
                    tooltip: {
                        backgroundColor: '#1E293B',
                        padding: 12,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                const total = {{ array_sum($levelCount) }};
                                const value = context.raw;
                                const percent = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                return ` ${context.label}: ${value} (${percent}%)`;
                            }
                        }
                    }
                },
                scales: type === 'bar' ? {
                    y: {
                        beginAtZero: true,
                        grid: { borderDash: [2, 4], color: '#E2E8F0', drawBorder: false }
                    },
                    x: {
                        grid: { display: false, drawBorder: false }
                    }
                } : {}
            };

            chartInstance = new Chart(ctx, {
                type: type,
                data: levelData,
                options: options
            });
            currentChartType = type;
        }

        function changeChartType(type) {
            renderChart(type);
        }

        // Modal Logic
        document.addEventListener('DOMContentLoaded', function() {
            renderChart(currentChartType);

            const openBtn = document.getElementById('openBundlingModal');
            const closeBtn = document.getElementById('cancelBundlingModal');
            const modal = document.getElementById('bundlingModal');
            const backdrop = document.getElementById('modalBackdrop');
            const panel = document.getElementById('modalPanel');

            function showModal() {
                modal.classList.remove('hidden');
                // Small delay to allow transition
                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                    panel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
                    panel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
                }, 20);
            }

        function hideModal() {
                backdrop.classList.add('opacity-0');
                panel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
                panel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
                
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }

            openBtn.addEventListener('click', showModal);
            closeBtn.addEventListener('click', hideModal);

            // Close on click outside
            modal.addEventListener('click', function(e) {
                if (e.target === document.querySelector('#bundlingModal > div')) { // Target the scrollable container
                    hideModal();
                }
            });
        });
    </script>
@endsection