<div id="asesiTableSection" class="bg-white rounded-xl shadow-md p-6 lg:col-span-2">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold text-gray-800">Pengguna Terbaru</h3>
        <a href="{{ route('admin.asesi.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lihat
            Semua</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No HP</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gender</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Terdaftar</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($users as $user)
                    <tr>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <div>
                                    <img src="{{ $user->userProfile->profile_image ? asset('/storage/' . $user->userProfile->profile_image) : asset('/storage/blankProfile.png') }}"
                                        alt="foto profile asesi" class="h-8 w-8 rounded-full object-cover" />
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-medium">{{ $user->userProfile->no_wa }}</span>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            @if ($user->userProfile->jenis_kelamin === 'L')
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">Laki-laki</span>
                            @elseif ($user->userProfile->jenis_kelamin === 'P')
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-pink-100 text-pink-800 rounded-full">Perempuan</span>
                            @else
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-xs text-gray-500">
                            <span class="bg-purple-100 text-purple-800 font-medium rounded-full p-1">
                                {{ $user->created_at->diffForHumans() }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-3 text-center text-sm text-gray-500">
                            Tidak ada data yang masuk
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</div>
