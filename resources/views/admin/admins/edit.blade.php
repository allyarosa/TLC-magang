@extends('layouts.adminDashboard')

@section('content')
    <div class="max-w-5xl mx-auto px-4 pt-6 mt-4">
        <div
            class="flex items-center justify-between p-4 mb-6 bg-gradient-to-r from-yellow-600 to-yellow-800 rounded-xl shadow-lg">
            <a href="{{ route('admin.admins.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-lg bg-white text-yellow-800 hover:bg-yellow-50 transition-colors duration-200 shadow">
                <i class="mr-2 fa-solid fa-arrow-left-long"></i> Kembali
            </a>
            <h1 class="text-xl font-bold text-white sm:text-2xl">Edit Admin</h1>
        </div>

        <div class="bg-white border border-gray-100 rounded-xl shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-gray-50 to-white p-6 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    ✏️ Informasi Admin
                </h3>
            </div>

            <div class="p-6">
                <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div
                        class="flex flex-col items-center mb-8 p-4 border border-dashed border-gray-300 rounded-lg bg-gray-50">
                        <img id="profilePreview"
                            src="{{ $admin->adminsProfile && $admin->adminsProfile->profile_image
                                ? asset('storage/' . $admin->adminsProfile->profile_image)
                                : asset('assets/img/blank_profile.png') }}"
                            class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg">
                        <input id="profilInput" name="profile_image" type="file" accept=".jpg,.jpeg,.png"
                            onchange="previewImage(event)" class="hidden">
                        <label for="profilInput"
                            class="text-sm mt-2 font-medium text-blue-600 hover:underline cursor-pointer">
                            Ubah Foto Profil
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email">Email *</label>
                            <input type="email" name="email" id="email" required class="w-full p-2 border rounded"
                                value="{{ old('email', $admin->email) }}">
                        </div>

                        <div>
                            <label for="password">Password (Kosongkan jika tidak ingin diubah)</label>
                            <input type="password" name="password" id="password"
                                placeholder="Biarkan kosong jika tidak ingin diubah" class="w-full p-2 border rounded">
                        </div>
                    </div>

                    <div class="flex justify-center mt-6">
                        <button type="submit" class="px-6 py-3 bg-yellow-600 hover:bg-yellow-700 text-white rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = () => {
                document.getElementById('profilePreview').src = reader.result;
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
@endsection
