@extends('layouts.adminDashboard')

@section('content')
    <div class="max-w-3xl mx-auto px-4 pt-6 mt-4">
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.admins.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-blue-800 hover:bg-blue-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Detail Admin</h1>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden p-6">
            <div class="flex flex-col items-center text-center">
                <img src="{{ $admin->adminsProfile && $admin->adminsProfile->profile_image
                    ? asset('storage/' . $admin->adminsProfile->profile_image)
                    : asset('assets/img/blank_profile.png') }}"
                    class="w-32 h-32 rounded-full object-cover mb-4 border-4 border-white shadow">
                <h2 class="text-xl font-bold">{{ $admin->email }}</h2>
                <p class="text-gray-600">Role: Admin</p>
                <p class="text-sm mt-1 text-gray-500">Status:
                    <span class="font-semibold">
                        Aktif
                    </span>
                </p>
            </div>

            <div class="mt-4 text-sm text-gray-500">
                <p>Dibuat pada: {{ $admin->created_at->format('d M Y, H:i') }}</p>
                <p>Terakhir diperbarui: {{ $admin->updated_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
    </div>
@endsection
