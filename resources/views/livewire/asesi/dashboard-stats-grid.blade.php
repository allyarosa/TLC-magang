
<div class="lg:col-span-4 grid grid-cols-1 gap-4">

    <div class="bg-white p-6 rounded-xl flex items-center gap-4">
        <div class="w-12 h-12 rounded-lg bg-brandBlue/30 flex items-center justify-center text-primary">
            <x-icons iconName="calendar_today" class="text-brandBlue-dark"/>
        </div>
        <div>
            <p class="text-2xl font-bold text-gray-700">{{ $daysSinceJoined }}</p>
            <p class="text-xs text-gray-700 font-medium">Hari Bergabung</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl flex items-center gap-4">
        <div class="w-12 h-12 rounded-lg bg-brandOrange/30 flex items-center justify-center text-secondary">
            <x-icons iconName="task_alt" class="text-brandOrange-dark"/>
        </div>
        <div>
            <p class="text-2xl font-display font-bold text-gray-700">
                {{ $hasAccess ? $completedTasks . '/' . $maxCompletedTasks : '-' }}
            </p>
            <p class="text-xs text-gray-700 font-medium">Tugas Selesai
            </p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl flex items-center gap-4">
        <div class="w-12 h-12 rounded-lg bg-brandGreen/30 flex items-center justify-center text-tertiary">
            <x-icons iconName="military_tech" class="text-brandGreen-dark"/>
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
