@extends('layouts.adminDashboard')

@section('title', 'Admin Dashboard - Voucher Management')

@section('content')
<div class="p-4 bg-white rounded-lg mb-2">
    <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
        <!-- Breadcrumb -->
        <livewire:admin.breadcrumb-nav label="Manajemen Voucher" route="admin.vouchers.index" />

        <!-- Actions -->
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.vouchers.create') }}">
                <button class="px-3 py-1.5 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                    + Tambah Voucher
                </button>
            </a>
        </div>
    </nav>
</div>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r bg-blue-600">
                <tr>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Kode</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Tipe</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Nilai Diskon</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Sisa Kuota</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Masa Aktif</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Status</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($vouchers as $voucher)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900">{{ $voucher->code }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        @if($voucher->type === 'fully_funded')
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Fully Funded</span>
                        @elseif($voucher->type === 'partial_funded')
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Partial Funded (50%)</span>
                        @else
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Nominal</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        @if($voucher->type === 'fully_funded')
                            Rp 0
                        @elseif($voucher->type === 'partial_funded')
                            50%
                        @else
                            Rp {{ number_format($voucher->value, 0, ',', '.') }}
                        @endif
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        {{ $voucher->max_uses === null ? 'Unlimited' : ($voucher->max_uses - $voucher->uses) . ' / ' . $voucher->max_uses }}
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                        {{ $voucher->valid_from ? \Carbon\Carbon::parse($voucher->valid_from)->format('d M Y') : 'Selamanya' }} - 
                        {{ $voucher->valid_until ? \Carbon\Carbon::parse($voucher->valid_until)->format('d M Y') : 'Selamanya' }}
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        @if($voucher->is_active)
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Aktif</span>
                        @else
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.vouchers.edit', $voucher->id) }}" class="p-2 text-indigo-600 bg-indigo-50 rounded-md hover:bg-indigo-100">
                                Edit
                            </a>
                            <form action="{{ route('admin.vouchers.destroy', $voucher->id) }}" method="POST" onsubmit="return confirm('Hapus voucher ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 bg-red-50 rounded-md hover:bg-red-100">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada voucher.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-4">
    {{ $vouchers->links() }}
</div>
@endsection
