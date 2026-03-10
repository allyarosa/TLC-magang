@extends('layouts.adminDashboard')

@section('title', 'Manajemen Level Asesi')

@section('content')
<div class="p-4 max-w-5xl">

    {{-- Back + Title --}}
    <div class="flex items-center gap-3 mb-5">
        <a href="{{ route('admin.asesi.index') }}" class="text-gray-400 hover:text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div>
            <h1 class="text-lg font-semibold text-gray-800">Manajemen Permission</h1>
            <p class="text-sm text-gray-500">{{ $targetUser->name }} &bull; {{ $targetUser->email }}</p>
        </div>
    </div>

    {{-- Flash --}}
    @if (session('success'))
        <div class="mb-4 text-sm text-green-700 bg-green-50 border border-green-200 rounded px-4 py-2">
            {{ session('success') }}
        </div>
    @endif
    @if (session('info'))
        <div class="mb-4 text-sm text-blue-700 bg-blue-50 border border-blue-200 rounded px-4 py-2">
            {{ session('info') }}
        </div>
    @endif

    {{-- Permission Groups --}}
    @foreach ($groupedPermissions as $category => $permissions)
        <div class="mb-6">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">{{ $category }}</h2>
            <div class="bg-white border border-gray-200 rounded-lg divide-y divide-gray-100">
                @foreach ($permissions as $permission)
                    @php $hasPermission = $targetUser->hasPermissionTo($permission); @endphp
                    <div class="flex items-center justify-between px-4 py-2.5">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full flex-shrink-0 {{ $hasPermission ? 'bg-green-400' : 'bg-gray-300' }}"></span>
                            <span class="text-sm text-gray-700 font-mono">{{ $permission }}</span>
                        </div>
                        <form method="POST" action="{{ route('admin.asesi.level-management.update', $userProfile->id) }}">
                            @csrf
                            <input type="hidden" name="permission" value="{{ $permission }}">
                            @if ($hasPermission)
                                <input type="hidden" name="action" value="revoke">
                                <button type="submit"
                                    class="text-xs px-3 py-1 rounded border border-red-300 text-red-600 hover:bg-red-50 transition-colors"
                                    onclick="return confirm('Cabut permission ini?')">
                                    Revoke
                                </button>
                            @else
                                <input type="hidden" name="action" value="assign">
                                <button type="submit"
                                    class="text-xs px-3 py-1 rounded border border-blue-300 text-blue-600 hover:bg-blue-50 transition-colors">
                                    Grant
                                </button>
                            @endif
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection