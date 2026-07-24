<div class="lg:col-span-4 grid grid-cols-1 gap-4">

    <div class="bg-white p-6 rounded-xl flex items-center gap-4 shadow-sm">
        <div class="w-10 h-10 flex items-center justify-center text-primary">
            {{-- <x-icons iconName="calendar_today" class="text-brandBlue-dark"/> --}}
            <img src="{{ asset('assets/icons/cloudy.png') }}" alt="icon hari bergabung">
        </div>
        <div>
            <p class="text-2xl font-bold text-gray-700">{{ $daysSinceJoined }}</p>
            <p class="text-xs text-gray-700 font-medium">Hari Bergabung</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl flex items-center gap-4 shadow-sm">
        <div class="w-10 h-10 flex items-center justify-center text-secondary">
            {{-- <x-icons iconName="task_alt" class="text-brandOrange-dark"/> --}}
            <img src="{{ asset('assets/icons/done.png') }}" alt="">
        </div>
        <div>
            <p class="text-2xl font-display font-bold text-gray-700">
                {{ $hasAccess ? $completedTasks . '/' . $maxCompletedTasks : '-' }}
            </p>
            <p class="text-xs text-gray-700 font-medium">Tugas Selesai
            </p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl flex items-center gap-4 shadow-sm">
        <div class="w-10 h-10 flex items-center justify-center text-tertiary">
            {{-- <x-icons iconName="military_tech" class="text-brandGreen-dark"/> --}}
            <img src="{{ asset('assets/icons/certificate.png') }}" alt="">
        </div>
        <div>
            <p class="text-2xl font-display font-bold text-gray-700" >
                {{ $hasAccess ? '0': '-' }}
            </p>
            <p class="text-xs text-gray-700 font-medium" >Sertifikat Utama
            </p>
        </div>
    </div>
</div>
