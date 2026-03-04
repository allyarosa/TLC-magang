@extends('layouts.adminDashboard')

@section('title', $title)

@section('content')
    <div class="max-w-6xl mx-auto px-4 pt-6 mt-4">
        {{-- Header --}}
        <div class="flex items-center justify-between p-4 mb-6 bg-biru border-b border-gray-200 shadow-md rounded-lg">
            <a href="{{ route('admin.asesi.show', $asesi->id) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors duration-200">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i>
                Kembali ke Detail Asesi
            </a>
            <h1 class="text-lg font-semibold text-white sm:text-2xl">
                Riwayat Pembayaran
            </h1>
        </div>

        {{-- Info Asesi --}}
        <div class="bg-white rounded-xl shadow-md p-5 mb-6">
            <div class="flex items-center gap-4">
                <img src="{{ $asesi->profile_image ? asset('storage/' . $asesi->profile_image) : asset('assets/img/blank_profile.png') }}"
                    alt="Profile" class="w-14 h-14 object-cover rounded-full border-3 border-blue-500 shadow">
                <div>
                    <h2 class="text-lg font-bold text-gray-900">{{ $asesi->name }}</h2>
                    @if ($asesi->nama_depan)
                        <p class="text-sm text-gray-500">{{ $asesi->nama_depan }}</p>
                    @endif
                    <p class="text-xs text-gray-400 mt-1">{{ $asesi->user->email ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- Tabel Riwayat Pembayaran --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-5 py-3 flex items-center gap-2">
                <i class="fa-solid fa-receipt text-white"></i>
                <h3 class="text-white font-semibold text-sm">Riwayat Pembayaran</h3>
                <span class="ml-auto text-white/70 text-xs">{{ $payments->count() }} transaksi</span>
            </div>

            @if ($payments->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
                            <tr>
                                <th class="px-5 py-3">#</th>
                                <th class="px-5 py-3">Tanggal</th>
                                <th class="px-5 py-3">Level</th>
                                <th class="px-5 py-3">Harga</th>
                                <th class="px-5 py-3">Tipe Pembayaran</th>
                                <th class="px-5 py-3">Status</th>
                                <th class="px-5 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($payments as $index => $payment)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-5 py-3 text-gray-500 font-medium">{{ $index + 1 }}</td>
                                    <td class="px-5 py-3 text-gray-700">
                                        {{ $payment->created_at->format('d M Y, H:i') }}
                                    </td>
                                    <td class="px-5 py-3">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-blue-100 text-blue-700">
                                            {{ $payment->level->name ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-3 text-gray-800 font-semibold">
                                        Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                    </td>
                                    <td class="px-5 py-3 text-gray-600">
                                        {{ ucfirst(str_replace('_', ' ', $payment->payment_type ?? '-')) }}
                                    </td>
                                    <td class="px-5 py-3">
                                        @switch($payment->status)
                                            @case('success')
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-green-100 text-green-700">
                                                    <i class="fa-solid fa-check mr-1"></i> Success
                                                </span>
                                            @break

                                            @case('pending')
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-yellow-100 text-yellow-700">
                                                    <i class="fa-solid fa-clock mr-1"></i> Pending
                                                </span>
                                            @break

                                            @case('failed')
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-red-100 text-red-700">
                                                    <i class="fa-solid fa-xmark mr-1"></i> Failed
                                                </span>
                                            @break

                                            @case('expired')
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-gray-100 text-gray-600">
                                                    <i class="fa-solid fa-hourglass-end mr-1"></i> Expired
                                                </span>
                                            @break

                                            @default
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-gray-100 text-gray-600">
                                                    {{ ucfirst($payment->status) }}
                                                </span>
                                        @endswitch
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <button type="button"
                                                class="inline-flex items-center px-2.5 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-[11px] font-medium rounded-lg transition-colors duration-200 border border-emerald-200"
                                                onclick="alert('Fitur Receipt akan segera tersedia')">
                                                <i class="fa-solid fa-receipt mr-1"></i> Receipt
                                            </button>
                                            <button type="button"
                                                class="inline-flex items-center px-2.5 py-1.5 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 text-[11px] font-medium rounded-lg transition-colors duration-200 border border-indigo-200"
                                                onclick="alert('Fitur Invoice akan segera tersedia')">
                                                <i class="fa-solid fa-file-invoice mr-1"></i> Invoice
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-12 text-center my-12">
                    <i class="fa-solid fa-inbox text-gray-300 text-4xl mb-3"></i>
                    <p class="text-sm text-gray-400">Belum ada riwayat pembayaran untuk asesi ini</p>
                </div>
            @endif
        </div>

    </div>
@endsection
