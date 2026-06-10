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
    <div class="flex-1 md:ml-64 p-6 md:p-12 lg:p-16 max-w-7xl mx-auto w-full flex flex-col gap-10">
        <!-- Header Section -->
        <header class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-blue-200 text-blue-600 rounded-2xl border border-blue-100 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9h6m-6 4h6m-6-8h.01M9 16h.01" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-700 tracking-tight mb-1">
                        Transaksi
                    </h1>
                    <p class="text-lg text-gray-800">
                        Kelola riwayat transaksi pembayaran dan pantau status tagihan sertifikasi Anda disini.
                    </p>
                </div>
            </div>
            <div class="flex gap-4 w-full md:w-auto">
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
            </div>
        </header>
        <!-- Financial Summary Cards (Bento style) -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Spent Card -->
            <div
                class="bg-white rounded-xl px-6 py-3 relative overflow-hidden group hover:bg-surface-bright transition-colors shadow-[0px_4px_16px_rgba(24,28,30,0.04)] border border-outline-variant/10">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/10 transition-colors duration-500">
                </div>
                <div class="flex justify-between items-start">
                    <div class="p-3 bg-surface-container-low rounded-lg text-primary">
                        <span class="material-symbols-outlined">account_balance_wallet</span>
                    </div>
                </div>
                <p class="text-sm font-label text-on-surface-variant font-semibold tracking-wide uppercase mb-1">Total
                    Transaksi</p>
                <p class="font-headline text-3xl font-bold text-gray-800">IDR 4,250,000</p>
                <div class="mt-4 flex items-center gap-2 text-sm">
                    <span class="flex items-center text-secondary font-medium">
                        <span class="material-symbols-outlined text-sm mr-1">trending_up</span>
                        12%
                    </span>
                    <span class="text-on-surface-variant">vs last year</span>
                </div>
            </div>
            <!-- Active Subscriptions -->
            <div
                class="bg-white rounded-xl px-6 py-3 relative overflow-hidden group hover:bg-surface-bright transition-colors shadow-[0px_4px_16px_rgba(24,28,30,0.04)] border border-outline-variant/10">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-secondary/5 rounded-full blur-2xl group-hover:bg-secondary/10 transition-colors duration-500">
                </div>
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-surface-container-low rounded-lg text-secondary">
                        <span class="material-symbols-outlined">autorenew</span>
                    </div>
                </div>
                <p class="text-sm font-label text-on-surface-variant font-semibold tracking-wide uppercase mb-1">Transaksi
                    Sukses</p>
                <p class="font-headline text-3xl font-bold text-gray-800">3 Plans</p>
                <div class="mt-4 flex items-center gap-2 text-sm text-on-surface-variant">
                    Next billing: 15 Jan 2024
                </div>
            </div>
            <!-- Pending Payments -->
            <div
                class="bg-white rounded-xl px-6 py-3 relative overflow-hidden group hover:bg-surface-bright transition-colors shadow-[0px_4px_16px_rgba(24,28,30,0.04)] border border-outline-variant/10">
                <div
                    class="absolute -right-4 -top-4 w-24 h-24 bg-tertiary/5 rounded-full blur-2xl group-hover:bg-tertiary/10 transition-colors duration-500">
                </div>
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-surface-container-low rounded-lg text-tertiary">
                        <span class="material-symbols-outlined">pending_actions</span>
                    </div>
                </div>
                <p class="text-sm font-label text-on-surface-variant font-semibold tracking-wide uppercase mb-1">Menunggu
                    Pembayaran</p>
                <p class="font-headline text-3xl font-bold text-gray-800">IDR 150,000</p>
                <div class="mt-4 flex items-center gap-2 text-sm text-tertiary font-medium">
                    1 Invoice awaiting payment
                </div>
            </div>
        </section>
        <!-- Transaction History Table Area -->
        <section
            class="bg-white rounded-xl shadow-[0px_12px_32px_rgba(24,28,30,0.04)] overflow-hidden border border-outline-variant/10">
            <!-- Table Header/Search -->
            <div
                class="p-6 border-b border-surface-container-low flex flex-col sm:flex-row justify-between items-center gap-4">
                <h3 class="font-headline text-xl font-bold text-gray-800">History Transaksi</h3>
                <div class="relative w-full sm:w-72">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
                    <input
                        class="w-full bg-surface-container-highest border-0 rounded-md py-2.5 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-colors text-on-surface placeholder-on-surface-variant/70"
                        placeholder="Search transactions..." type="text">
                </div>
            </div>
            <!-- Table Container -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-surface-container-low/50 text-on-surface-variant text-sm font-label font-semibold tracking-wide uppercase">
                            <th class="p-4 whitespace-nowrap pl-6">Date</th>
                            <th class="p-4 whitespace-nowrap">Transaction ID</th>
                            <th class="p-4 whitespace-nowrap min-w-[200px]">Description</th>
                            <th class="p-4 whitespace-nowrap text-right">Amount</th>
                            <th class="p-4 whitespace-nowrap">Method</th>
                            <th class="p-4 whitespace-nowrap">Status</th>
                            <th class="p-4 whitespace-nowrap pr-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-body divide-y divide-surface-container-low">
                        <!-- Row 1 -->
                        <tr class="hover:bg-surface-bright transition-colors group">
                            <td class="p-4 pl-6 text-on-surface-variant whitespace-nowrap">12 Dec 2023</td>
                            <td class="p-4 font-medium text-primary whitespace-nowrap">#TLC-9821</td>
                            <td class="p-4 text-on-surface">Level A Full Package</td>
                            <td class="p-4 text-right font-medium text-gray-800 whitespace-nowrap">IDR 1,500,000
                            </td>
                            <td class="p-4 text-on-surface-variant whitespace-nowrap">Virtual Account Mandiri</td>
                            <td class="p-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-secondary-container text-on-secondary-container">
                                    Paid
                                </span>
                            </td>
                            <td class="p-4 pr-6 text-center whitespace-nowrap">
                                <button
                                    class="text-on-surface-variant hover:text-primary transition-colors p-1.5 rounded-full hover:bg-surface-container-low"
                                    title="Download Receipt">
                                    <span class="material-symbols-outlined text-[20px]">download</span>
                                </button>
                            </td>
                        </tr>
                        <!-- Row 2 -->
                        <tr class="hover:bg-surface-bright transition-colors group">
                            <td class="p-4 pl-6 text-on-surface-variant whitespace-nowrap">05 Dec 2023</td>
                            <td class="p-4 font-medium text-primary whitespace-nowrap">#TLC-9754</td>
                            <td class="p-4 text-on-surface">Workshop Sesi 12</td>
                            <td class="p-4 text-right font-medium text-gray-800 whitespace-nowrap">IDR 250,000
                            </td>
                            <td class="p-4 text-on-surface-variant whitespace-nowrap">GoPay</td>
                            <td class="p-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-secondary-container text-on-secondary-container">
                                    Paid
                                </span>
                            </td>
                            <td class="p-4 pr-6 text-center whitespace-nowrap">
                                <button
                                    class="text-on-surface-variant hover:text-primary transition-colors p-1.5 rounded-full hover:bg-surface-container-low"
                                    title="Download Receipt">
                                    <span class="material-symbols-outlined text-[20px]">download</span>
                                </button>
                            </td>
                        </tr>
                        <!-- Row 3 -->
                        <tr class="hover:bg-surface-bright transition-colors group">
                            <td class="p-4 pl-6 text-on-surface-variant whitespace-nowrap">28 Nov 2023</td>
                            <td class="p-4 font-medium text-primary whitespace-nowrap">#TLC-9610</td>
                            <td class="p-4 text-on-surface">Modul Ekstra Literasi</td>
                            <td class="p-4 text-right font-medium text-gray-800 whitespace-nowrap">IDR 150,000
                            </td>
                            <td class="p-4 text-on-surface-variant whitespace-nowrap">Credit Card (Visa)</td>
                            <td class="p-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-tertiary-container text-on-tertiary-container">
                                    Pending
                                </span>
                            </td>
                            <td class="p-4 pr-6 text-center whitespace-nowrap">
                                <button
                                    class="text-on-surface-variant hover:text-primary transition-colors p-1.5 rounded-full hover:bg-surface-container-low"
                                    title="Retry Payment">
                                    <span class="material-symbols-outlined text-[20px]">payment</span>
                                </button>
                            </td>
                        </tr>
                        <!-- Row 4 -->
                        <tr class="hover:bg-surface-bright transition-colors group">
                            <td class="p-4 pl-6 text-on-surface-variant whitespace-nowrap">15 Nov 2023</td>
                            <td class="p-4 font-medium text-primary whitespace-nowrap">#TLC-9432</td>
                            <td class="p-4 text-on-surface">Annual Subscription Renewal</td>
                            <td class="p-4 text-right font-medium text-gray-800 whitespace-nowrap">IDR 2,000,000
                            </td>
                            <td class="p-4 text-on-surface-variant whitespace-nowrap">OVO</td>
                            <td class="p-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-secondary-container text-on-secondary-container">
                                    Paid
                                </span>
                            </td>
                            <td class="p-4 pr-6 text-center whitespace-nowrap">
                                <button
                                    class="text-on-surface-variant hover:text-primary transition-colors p-1.5 rounded-full hover:bg-surface-container-low"
                                    title="Download Receipt">
                                    <span class="material-symbols-outlined text-[20px]">download</span>
                                </button>
                            </td>
                        </tr>
                        <!-- Row 5 (Failed Example) -->
                        <tr class="hover:bg-surface-bright transition-colors group">
                            <td class="p-4 pl-6 text-on-surface-variant whitespace-nowrap">02 Nov 2023</td>
                            <td class="p-4 font-medium text-primary whitespace-nowrap">#TLC-9311</td>
                            <td class="p-4 text-on-surface">Masterclass: Digital Pedagogy</td>
                            <td class="p-4 text-right font-medium text-gray-800 whitespace-nowrap">IDR 500,000
                            </td>
                            <td class="p-4 text-on-surface-variant whitespace-nowrap">Bank Transfer BCA</td>
                            <td class="p-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-error-container text-on-error-container">
                                    Failed
                                </span>
                            </td>
                            <td class="p-4 pr-6 text-center whitespace-nowrap">
                                <button
                                    class="text-on-surface-variant hover:text-error transition-colors p-1.5 rounded-full hover:bg-surface-container-low"
                                    title="View Details">
                                    <span class="material-symbols-outlined text-[20px]">info</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination Footer -->
            <div
                class="p-4 border-t border-surface-container-low flex justify-between items-center text-sm text-on-surface-variant bg-surface-container-lowest">
                <span>Showing 1 to 5 of 24 transactions</span>
                <div class="flex gap-2">
                    <button class="p-1 rounded hover:bg-surface-container-low transition-colors disabled:opacity-50"
                        disabled="">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </button>
                    <button
                        class="w-7 h-7 rounded bg-primary text-on-primary flex items-center justify-center font-medium">1</button>
                    <button
                        class="w-7 h-7 rounded hover:bg-surface-container-low transition-colors flex items-center justify-center font-medium">2</button>
                    <button
                        class="w-7 h-7 rounded hover:bg-surface-container-low transition-colors flex items-center justify-center font-medium">3</button>
                    <span class="w-7 h-7 flex items-center justify-center">...</span>
                    <button class="p-1 rounded hover:bg-surface-container-low transition-colors">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </button>
                </div>
            </div>
        </section>
    </div>
@endsection
