<div>
    <ol class="flex items-center space-x-1 text-gray-600">
        <nav
            class="flex items-center space-x-2 text-sm font-medium text-gray-500 bg-white px-4 py-2 rounded-lg shadow-md border border-gray-100">
            {{-- Dashboard Link --}}
            <a href="{{ route('admin.dashboard') }}"
                class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.dashboard.*') ? 'text-blue-600 font-semibold' : '' }}">
                Dashboard
            </a>
            <span class="text-gray-300">/</span>

            {{-- Second Link --}}
            <a href="{{ route($route) }}"
                class="transition-colors hover:text-blue-600 {{ request()->routeIs(str($route)->beforeLast('.') . '.*') ? 'text-blue-600 font-semibold' : '' }}">
                {{ $label }}
            </a>
        </nav>
    </ol>
</div>
