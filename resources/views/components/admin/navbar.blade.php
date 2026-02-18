{{-- Navbar Component for Level A Admin Pages --}}
<nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
    <ol class="flex items-center space-x-1 text-gray-600">
        <nav class="flex items-center space-x-2 text-sm font-medium text-gray-500 bg-white px-4 py-2 rounded-lg shadow-md border border-gray-100">

            {{-- Kategori Soal --}}
            <a href="{{ route('admin.categories.a.index') }}"
                class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.categories.a.*') ? 'text-blue-600 font-semibold' : '' }}">
                Kategori Soal
            </a>

            <span class="text-gray-300">/</span>

            {{-- Bank Soal --}}
            <a href="{{ route('admin.question.a.index') }}"
                class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.question.a.*') ? 'text-blue-600 font-semibold' : '' }}">
                Bank Soal
            </a>

            <span class="text-gray-300">/</span>

            {{-- Exam Monitoring --}}
            <a href="{{ route('admin.exam.monitoring.a.index') }}"
                class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.exam.monitoring.a.*') ? 'text-blue-600 font-semibold' : '' }}">
                Exam Monitoring
            </a>

            <span class="text-gray-300">/</span>

            {{-- Survey Result --}}
            <a href="{{ route('admin.survey-result.a.index') }}"
                class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.survey-result.a.*') ? 'text-blue-600 font-semibold' : '' }}">
                Survey Result
            </a>

            <span class="text-gray-300">/</span>

            {{-- Score Result --}}
            <a href="{{ route('admin.level.a.hasil-penilaian') }}"
                class="transition-colors hover:text-blue-600 {{ request()->routeIs('admin.level.a.hasil-penilaian*') ? 'text-blue-600 font-semibold' : '' }}">
                Score Result
            </a>

        </nav>
    </ol>
</nav>