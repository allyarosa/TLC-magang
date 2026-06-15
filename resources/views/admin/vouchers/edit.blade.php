@extends('layouts.adminDashboard')

@section('title', 'Edit Voucher')

@section('content')
<div class="p-4 bg-white rounded-lg mb-4">
    <livewire:admin.breadcrumb-nav label="Edit Voucher" route="admin.vouchers.index" />
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <form action="{{ route('admin.vouchers.update', $voucher->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Kode Voucher</label>
                <input type="text" name="code" value="{{ old('code', $voucher->code) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 sm:text-sm" readonly>
                <p class="text-xs text-gray-500 mt-1">Kode voucher tidak dapat diubah.</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tipe Diskon <span class="text-red-500">*</span></label>
                <select name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    <option value="discount" {{ old('type', $voucher->type) == 'discount' ? 'selected' : '' }}>Nominal (Rp)</option>
                    <option value="partial_funded" {{ old('type', $voucher->type) == 'partial_funded' ? 'selected' : '' }}>Partial Funded (Diskon 50%)</option>
                    <option value="fully_funded" {{ old('type', $voucher->type) == 'fully_funded' ? 'selected' : '' }}>Fully Funded (Gratis)</option>
                </select>
                @error('type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nilai Diskon</label>
                <input type="number" name="value" value="{{ old('value', $voucher->value) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Contoh: 50000">
                <p class="text-xs text-gray-500 mt-1">Isi jika tipe Nominal (Rp). Kosongkan jika tipe Fully Funded / Partial Funded.</p>
                @error('value') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Maksimal Penggunaan (Kuota)</label>
                <input type="number" name="max_uses" value="{{ old('max_uses', $voucher->max_uses) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Kosongkan jika unlimited">
                <p class="text-xs text-gray-500 mt-1">Telah digunakan: {{ $voucher->uses }} kali.</p>
                @error('max_uses') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Berlaku Mulai</label>
                <input type="date" name="valid_from" value="{{ old('valid_from', $voucher->valid_from ? \Carbon\Carbon::parse($voucher->valid_from)->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Berlaku Sampai</label>
                <input type="date" name="valid_until" value="{{ old('valid_until', $voucher->valid_until ? \Carbon\Carbon::parse($voucher->valid_until)->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            
            <div class="col-span-1 md:col-span-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_active" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ old('is_active', $voucher->is_active) ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-600">Aktif</span>
                </label>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Perbarui Voucher</button>
            <a href="{{ route('admin.vouchers.index') }}" class="ml-2 text-gray-600 hover:text-gray-900">Batal</a>
        </div>
    </form>
</div>
@endsection
