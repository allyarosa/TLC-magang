@extends('layouts.asesiDashboard')

@section('title', 'Teaching and Learning Certification')

@section('content')

    <script id="tailwind-config">
        tailwind.config = {
            theme: {
                extend: {
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
    <!-- Main Content Area -->
    <div class="flex-1 md:ml-64 p-6  max-w-7xl mx-auto w-full flex flex-col gap-10">
        <!-- Header Section -->
        <header class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-blue-200 text-brandBlue rounded-2xl border border-blue-100 flex-shrink-0">
                    <img src="{{ asset('assets/icons/transaction.png') }}" alt="" class="h-9 w-9 object-contain">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9h6m-6 4h6m-6-8h.01M9 16h.01" />
                    </svg> --}}
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-700 tracking-tight">
                        Transaksi
                    </h1>
                    <p class="text-lg text-gray-800">
                        Kelola riwayat transaksi pembayaran dan pantau status tagihan sertifikasi Anda disini.
                    </p>
                </div>
            </div>
            {{-- <div class="flex gap-4 w-full md:w-auto">
                <button
                    class="flex items-center gap-2 px-4 py-2 bg-white text-gray-700 rounded-md font-medium text-sm transition-colors border border-gray-200">
                    <span class="material-symbols-outlined text-sm">filter_list</span>
                    Filter
                </button>
                <button
                    class="flex items-center gap-2 px-4 py-2 bg-white text-gray-700 rounded-md font-medium text-sm transition-colors border border-gray-200">
                    <span class="material-symbols-outlined text-sm">download</span>
                    Export
                </button>
            </div> --}}
        </header>
        <!-- Financial Summary Cards (Bento style) -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Spent Card -->
            <div class="bg-white rounded-xl px-6 py-4 relative overflow-hidden group hover:bg-surface-bright transition-colors shadow-[0px_4px_16px_rgba(24,28,30,0.04)] border border-outline-variant/10">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/10 transition-colors duration-500">
                </div>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-sm font-label text-on-surface-variant font-semibold tracking-wide uppercase">Total Transaksi</p>
                    <div class="p-3 bg-brandBlue rounded-lg text-white flex-shrink-0">
                        <span class="material-symbols-outlined">account_balance_wallet</span>
                    </div>
                </div>
                <p class="font-headline text-3xl font-bold text-gray-800">{{ $paymentCount }}</p>
            </div>
            <!-- Active Subscriptions -->
            <div class="bg-white rounded-xl px-6 py-4 relative overflow-hidden group hover:bg-surface-bright transition-colors shadow-[0px_4px_16px_rgba(24,28,30,0.04)] border border-outline-variant/10">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-secondary/5 rounded-full blur-2xl group-hover:bg-secondary/10 transition-colors duration-500">
                </div>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-sm font-label text-on-surface-variant font-semibold tracking-wide uppercase">Transaksi Sukses</p>
                    <div class="p-2.5 bg-teal-600 rounded-lg text-white flex-shrink-0">
                        <span class="material-symbols-outlined">check_circle</span>
                    </div>
                </div>
                <p class="font-headline text-3xl font-bold text-gray-800">{{ $paymentSuccessCount ?? '0' }}</p>
            </div>
            <!-- Pending Payments -->
            <div class="bg-white rounded-xl px-6 py-4 relative overflow-hidden group hover:bg-surface-bright transition-colors shadow-[0px_4px_16px_rgba(24,28,30,0.04)] border border-outline-variant/10">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-tertiary/5 rounded-full blur-2xl group-hover:bg-tertiary/10 transition-colors duration-500">
                </div>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-sm font-label text-on-surface-variant font-semibold tracking-wide uppercase">Menunggu Pembayaran</p>
                    <div class="p-2.5 bg-brandOrange rounded-lg text-white flex-shrink-0">
                        <span class="material-symbols-outlined">pending_actions</span>
                    </div>
                </div>
                <p class="font-headline text-3xl font-bold text-gray-800">{{ $paymentPendingCount ?? '0' }}</p>
            </div>
        </section>
        <!-- Transaction History Table Area -->
        <section class="bg-white rounded-xl shadow-[0px_12px_32px_rgba(24,28,30,0.04)] overflow-hidden border border-outline-variant/10">
            <!-- Table Header/Search -->
            <div
                class="p-6 border-b border-surface-container-low flex flex-col sm:flex-row justify-between items-center gap-4">
                <h3 class="font-headline text-xl font-bold text-brandBlue">Riwayat Transaksi</h3>
                <div class="relative w-full sm:w-72">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                    <input
                        id="search-input"
                        class="w-full bg-surface-container-highest border-0 rounded-md py-2.5 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-colors text-on-surface placeholder-on-surface-variant/70"
                        placeholder="Cari transaksi..." type="text">
                </div>
            </div>
            <!-- Table Container -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-surface-container-low/50 text-slate-700 text-xs font-label font-medium tracking-wide uppercase">
                            <th class="p-4 whitespace-nowrap pl-6">Tanggal</th>
                            <th class="p-4 whitespace-nowrap">ID Transaksi</th>
                            <th class="p-4 whitespace-nowrap min-w-[200px]">Deskripsi</th>
                            <th class="p-4 whitespace-nowrap text-right">Jumlah</th>
                            <th class="p-4 whitespace-nowrap">Metode</th>
                            <th class="p-4 whitespace-nowrap">Status</th>
                            <th class="p-4 whitespace-nowrap pr-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-rows" class="text-sm font-body divide-y divide-surface-container-low">
                        @forelse ($pembayaran as $item)
                        <tr class="hover:bg-surface-bright transition-colors group">
                            <td class="p-4 pl-6 text-on-surface-variant whitespace-nowrap">
                                {{ $item->payment_time ? \Carbon\Carbon::parse($item->payment_time)->translatedFormat('d F Y') : '-' }}
                            </td>
                            <td class="p-4 font-medium text-primary whitespace-nowrap">
                                {{ $item->order_id ?? '#TLC-' . $item->id }}
                            </td>
                            <td class="p-4 text-on-surface">
                                Level {{ $item->level->level_name }}
                            </td>
                            <td class="p-4 text-right font-medium text-gray-800 whitespace-nowrap">
                                Rp {{ number_format($item->amount, 0, ',', '.') }}
                            </td>
                            <td class="p-4 text-on-surface-variant whitespace-nowrap">
                                {{ $item->payment_method ?? $item->payment_type ?? '-' }}
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                @if ($item->status === 'success')
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-green-100 text-green-800">
                                        Success
                                    </span>
                                @elseif ($item->status === 'pending')
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                @elseif ($item->status === 'failed')
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-red-100 text-red-800">
                                        Failed
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-gray-100 text-gray-800">
                                        {{ $item->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="p-4 pr-6 text-center whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    @if ($item->status === 'success')
                                        <a href="{{ route('asesi.transaksi.invoice', \Vinkla\Hashids\Facades\Hashids::encode($item->id)) }}" target="_blank"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-600 hover:bg-slate-700 text-white rounded-lg text-xs font-semibold transition-all shadow-sm hover:shadow"
                                            title="Download Receipt">
                                            <span class="material-symbols-outlined text-sm">download</span>
                                            Invoice
                                        </a>
                                    @elseif ($item->status === 'pending')
                                        <a href="{{ route('payments.detail', \Vinkla\Hashids\Facades\Hashids::encode($item->id)) }}"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold transition-all shadow-sm hover:shadow"
                                            title="Pay Now">
                                            <span class="material-symbols-outlined text-sm">payment</span>
                                            Pay
                                        </a>
                                    @else
                                        <span class="text-xs text-gray-400">-</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        @livewire('empty-state', [
                            'title' => 'Tidak Ada Data',
                            'colspan' => 7,
                            'message' => 'Belum ada data transaksi yang tersedia.',
                        ])
                        @endforelse
                        <tr id="no-search-results" class="hidden">
                            <td colspan="7" class="p-8 text-center text-gray-500">
                                Tidak ada transaksi yang cocok dengan pencarian Anda.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination Footer -->
            <div
                class="p-4 border-t border-surface-container-low flex justify-between items-center text-sm text-on-surface-variant bg-surface-container-lowest">
                <span>Menampilkan {{ $pembayaran->count() }} transaksi</span>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const tableBody = document.getElementById('transaction-rows');
            const rows = tableBody.querySelectorAll('tr:not(#no-search-results)');
            const noResultsRow = document.getElementById('no-search-results');

            if (searchInput && tableBody) {
                searchInput.addEventListener('input', function() {
                    const query = this.value.toLowerCase().trim();
                    let visibleCount = 0;

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        if (text.includes(query)) {
                            row.classList.remove('hidden');
                            visibleCount++;
                        } else {
                            row.classList.add('hidden');
                        }
                    });

                    if (visibleCount === 0 && query !== '') {
                        noResultsRow.classList.remove('hidden');
                    } else {
                        noResultsRow.classList.add('hidden');
                    }
                });
            }
        });
    </script>
@endsection