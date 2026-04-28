@extends('layouts.adminDashboard')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

        {{-- ════════════════════════════════════════
        ROW 1 — Stat Cards (6 cards)
    ════════════════════════════════════════ --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-6 gap-4">

            {{-- Total Asesi --}}
            <div
                class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col gap-3 group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                <div
                    class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium">Total Asesi</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $asesi }}</p>
                </div>
                <div
                    class="absolute -bottom-4 -right-4 w-16 h-16 bg-blue-50 rounded-full opacity-40 group-hover:scale-125 transition-transform duration-500">
                </div>
            </div>

            {{-- Total Asesor --}}
            <div
                class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col gap-3 group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                <div
                    class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium">Total Asesor</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $asesor }}</p>
                </div>
                <div
                    class="absolute -bottom-4 -right-4 w-16 h-16 bg-orange-50 rounded-full opacity-40 group-hover:scale-125 transition-transform duration-500">
                </div>
            </div>

            {{-- Total Admin --}}
            <div
                class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col gap-3 group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                <div
                    class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium">Total Admin</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $admins }}</p>
                </div>
                <div
                    class="absolute -bottom-4 -right-4 w-16 h-16 bg-indigo-50 rounded-full opacity-40 group-hover:scale-125 transition-transform duration-500">
                </div>
            </div>

            {{-- Total Revenue --}}
            <div
                class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col gap-3 group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                <div
                    class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium">Total Revenue</p>
                    <p class="text-lg font-bold text-slate-800">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                </div>
                <div
                    class="absolute -bottom-4 -right-4 w-16 h-16 bg-emerald-50 rounded-full opacity-40 group-hover:scale-125 transition-transform duration-500">
                </div>
            </div>

            {{-- Pembayaran Berhasil --}}
            <div
                class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col gap-3 group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                <div
                    class="w-10 h-10 bg-teal-50 rounded-xl flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium">Transaksi Sukses</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $settledPayments }}</p>
                </div>
                <div
                    class="absolute -bottom-4 -right-4 w-16 h-16 bg-teal-50 rounded-full opacity-40 group-hover:scale-125 transition-transform duration-500">
                </div>
            </div>

            {{-- Pembayaran Pending --}}
            <div
                class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col gap-3 group hover:shadow-md transition-all duration-300 relative overflow-hidden">
                <div
                    class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-medium">Pending Payment</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $pendingPayments }}</p>
                </div>
                <div
                    class="absolute -bottom-4 -right-4 w-16 h-16 bg-amber-50 rounded-full opacity-40 group-hover:scale-125 transition-transform duration-500">
                </div>
            </div>
        </div>

        {{-- ════════════════════════════════════════
         ROW 2 — Registration Line Chart + Level Pie Chart
    ════════════════════════════════════════ --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- Line chart: Registrasi per bulan --}}
            <div class="xl:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-base font-semibold text-slate-800">Registrasi Asesi</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Pengguna baru per bulan (6 bulan terakhir)</p>
                    </div>
                    <span class="w-8 h-8 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                        <i class="fas fa-chart-line text-sm"></i>
                    </span>
                </div>
                <div class="relative h-56">
                    <canvas id="registrationChart"></canvas>
                </div>
            </div>

            {{-- Doughnut / Bar: Distribusi level --}}
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-semibold text-slate-800 flex items-center gap-2">
                        <i class="fas fa-chart-pie text-slate-400"></i>
                        Status Sertifikasi
                    </h3>
                    <div class="bg-slate-100 p-0.5 rounded-lg inline-flex gap-0.5">
                        <button onclick="changeChartType('doughnut')" id="btn-doughnut"
                            class="px-3 py-1 text-xs font-medium rounded-md bg-white shadow-sm text-slate-800 transition-all">Donut</button>
                        <button onclick="changeChartType('bar')" id="btn-bar"
                            class="px-3 py-1 text-xs font-medium rounded-md text-slate-500 hover:text-slate-700 transition-all">Bar</button>
                    </div>
                </div>
                <div class="relative h-40 flex items-center justify-center">
                    <canvas id="userLevelChart"></canvas>
                </div>
                <div class="mt-4 space-y-2">
                    <div class="flex items-center justify-between text-sm">
                        <span class="flex items-center gap-2"><span
                                class="w-2.5 h-2.5 rounded-full bg-slate-300 inline-block"></span>Belum Terdaftar</span>
                        <span class="font-semibold text-slate-700">{{ $levelCount['userLevelNone'] }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="flex items-center gap-2"><span
                                class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block"></span>Level A</span>
                        <span class="font-semibold text-slate-700">{{ $levelCount['A'] }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="flex items-center gap-2"><span
                                class="w-2.5 h-2.5 rounded-full bg-blue-500 inline-block"></span>Level B</span>
                        <span class="font-semibold text-slate-700">{{ $levelCount['B'] }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="flex items-center gap-2"><span
                                class="w-2.5 h-2.5 rounded-full bg-purple-500 inline-block"></span>Level C</span>
                        <span class="font-semibold text-slate-700">{{ $levelCount['C'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ════════════════════════════════════════
         ROW 3 — Level Completion Bar + Asesi Table
    ════════════════════════════════════════ --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- Level Completion --}}
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-base font-semibold text-slate-800">Level Diselesaikan</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Jumlah asesi yang lulus per level</p>
                    </div>
                    <span class="w-8 h-8 flex items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <i class="fas fa-trophy text-sm"></i>
                    </span>
                </div>

                {{-- Level A --}}
                <div class="mb-4">
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-slate-700">Level A</span>
                        <span class="font-bold text-emerald-600">{{ $completedCount['A'] }}</span>
                    </div>
                    <div class="h-2.5 bg-slate-100 rounded-full overflow-hidden">
                        @php $maxCompleted = max(array_values($completedCount) ?: [1]); @endphp
                        <div class="h-full bg-emerald-500 rounded-full transition-all duration-700"
                            style="width: {{ $maxCompleted > 0 ? round(($completedCount['A'] / $maxCompleted) * 100) : 0 }}%">
                        </div>
                    </div>
                </div>

                {{-- Level B --}}
                <div class="mb-4">
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-slate-700">Level B</span>
                        <span class="font-bold text-blue-600">{{ $completedCount['B'] }}</span>
                    </div>
                    <div class="h-2.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-500 rounded-full transition-all duration-700"
                            style="width: {{ $maxCompleted > 0 ? round(($completedCount['B'] / $maxCompleted) * 100) : 0 }}%">
                        </div>
                    </div>
                </div>

                {{-- Level C --}}
                <div class="mb-6">
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-slate-700">Level C</span>
                        <span class="font-bold text-purple-600">{{ $completedCount['C'] }}</span>
                    </div>
                    <div class="h-2.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-purple-500 rounded-full transition-all duration-700"
                            style="width: {{ $maxCompleted > 0 ? round(($completedCount['C'] / $maxCompleted) * 100) : 0 }}%">
                        </div>
                    </div>
                </div>

                {{-- Completion chart --}}
                <div class="relative h-40">
                    <canvas id="completionChart"></canvas>
                </div>
            </div>

            {{-- Asesi Table (Livewire) --}}
            <div class="xl:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                @livewire('asesi-table')
            </div>
        </div>

        {{-- ════════════════════════════════════════
         ROW 4 — Recent Payments Table
    ════════════════════════════════════════ --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-base font-semibold text-slate-800 flex items-center gap-2">
                    <i class="fas fa-receipt text-slate-400"></i>
                    Transaksi Terbaru
                </h3>
                <a href="{{ route('admin.payments.index') }}"
                    class="text-xs text-blue-600 hover:underline font-medium">Lihat semua →</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-xs font-semibold text-slate-500 uppercase tracking-wide">
                        <tr>
                            <th class="px-6 py-3 text-left">Asesi</th>
                            <th class="px-6 py-3 text-left">Level</th>
                            <th class="px-6 py-3 text-left">Jumlah</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-left">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($recentPayments as $payment)
                            <tr class="hover:bg-slate-50/60 transition-colors">
                                <td class="px-6 py-3 font-medium text-slate-800">
                                    {{ $payment->user?->name ?? '-' }}
                                    <div class="text-xs text-slate-400">{{ $payment->user?->email ?? '' }}</div>
                                </td>
                                <td class="px-6 py-3 text-slate-600">
                                    {{ $payment->level?->name ?? 'Level ' . ($payment->level_id ?? '-') }}</td>
                                <td class="px-6 py-3 font-semibold text-slate-800">Rp
                                    {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                <td class="px-6 py-3">
                                    @if ($payment->status === 'settlement')
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Sukses
                                        </span>
                                    @elseif ($payment->status === 'pending')
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Pending
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                            {{ ucfirst($payment->status) }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-3 text-slate-400 text-xs">
                                    {{ $payment->created_at?->diffForHumans() }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-slate-400">Belum ada transaksi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- ════════════════════════════════════════
     SCRIPTS — Chart.js
════════════════════════════════════════ --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // ── Data from PHP ──────────────────────────
        const regLabels = @json($regLabels);
        const regData = @json($regData);

        const levelData = {
            labels: ['Belum Terdaftar', 'Level A', 'Level B', 'Level C'],
            datasets: [{
                data: [
                    {{ $levelCount['userLevelNone'] }},
                    {{ $levelCount['A'] }},
                    {{ $levelCount['B'] }},
                    {{ $levelCount['C'] }}
                ],
                backgroundColor: ['#E2E8F0', '#10B981', '#3B82F6', '#A855F7'],
                hoverBackgroundColor: ['#CBD5E1', '#059669', '#2563EB', '#9333EA'],
                borderWidth: 0,
                borderRadius: 5,
                cutout: '72%',
            }]
        };

        const completionData = {
            labels: ['Level A', 'Level B', 'Level C'],
            datasets: [{
                label: 'Lulus',
                data: [{{ $completedCount['A'] }}, {{ $completedCount['B'] }}, {{ $completedCount['C'] }}],
                backgroundColor: ['#10B981', '#3B82F6', '#A855F7'],
                borderRadius: 8,
                borderWidth: 0,
            }]
        };

        // ── Registration Line Chart ────────────────
        new Chart(document.getElementById('registrationChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: regLabels,
                datasets: [{
                    label: 'Asesi Baru',
                    data: regData,
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59,130,246,0.08)',
                    borderWidth: 2.5,
                    pointRadius: 4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#3B82F6',
                    pointBorderWidth: 2,
                    tension: 0.4,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1E293B',
                        padding: 10,
                        cornerRadius: 8,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            color: '#94A3B8',
                            font: {
                                size: 11
                            }
                        },
                        grid: {
                            color: '#F1F5F9',
                            drawBorder: false
                        }
                    },
                    x: {
                        ticks: {
                            color: '#94A3B8',
                            font: {
                                size: 11
                            }
                        },
                        grid: {
                            display: false,
                            drawBorder: false
                        }
                    }
                }
            }
        });

        // ── Level Doughnut / Bar Chart ─────────────
        let currentChartType = 'doughnut';
        let chartInstance = null;

        function renderChart(type) {
            const ctx = document.getElementById('userLevelChart').getContext('2d');
            const btnDoughnut = document.getElementById('btn-doughnut');
            const btnBar = document.getElementById('btn-bar');

            [btnDoughnut, btnBar].forEach(b => {
                b.classList.remove('bg-white', 'shadow-sm', 'text-slate-800');
                b.classList.add('text-slate-500');
            });
            const activeBtn = type === 'doughnut' ? btnDoughnut : btnBar;
            activeBtn.classList.add('bg-white', 'shadow-sm', 'text-slate-800');
            activeBtn.classList.remove('text-slate-500');

            if (chartInstance) chartInstance.destroy();

            chartInstance = new Chart(ctx, {
                type: type,
                data: levelData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#1E293B',
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(c) {
                                    const total = {{ array_sum($levelCount) }};
                                    const pct = total > 0 ? ((c.raw / total) * 100).toFixed(1) : 0;
                                    return ` ${c.label}: ${c.raw} (${pct}%)`;
                                }
                            }
                        }
                    },
                    scales: type === 'bar' ? {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#94A3B8',
                                font: {
                                    size: 11
                                }
                            },
                            grid: {
                                color: '#F1F5F9',
                                drawBorder: false
                            }
                        },
                        x: {
                            ticks: {
                                color: '#94A3B8',
                                font: {
                                    size: 11
                                }
                            },
                            grid: {
                                display: false,
                                drawBorder: false
                            }
                        }
                    } : {}
                }
            });
            currentChartType = type;
        }

        function changeChartType(type) {
            renderChart(type);
        }

        // ── Completion Bar Chart ───────────────────
        new Chart(document.getElementById('completionChart').getContext('2d'), {
            type: 'bar',
            data: completionData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1E293B',
                        padding: 10,
                        cornerRadius: 8,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            color: '#94A3B8',
                            font: {
                                size: 11
                            }
                        },
                        grid: {
                            color: '#F1F5F9',
                            drawBorder: false
                        }
                    },
                    x: {
                        ticks: {
                            color: '#94A3B8',
                            font: {
                                size: 11
                            }
                        },
                        grid: {
                            display: false,
                            drawBorder: false
                        }
                    }
                }
            }
        });

        // ── Init ───────────────────────────────────
        document.addEventListener('DOMContentLoaded', () => {
            renderChart('doughnut');
        });
    </script>
@endsection
