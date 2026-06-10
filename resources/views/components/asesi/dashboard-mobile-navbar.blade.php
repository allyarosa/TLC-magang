@php
    $navItems = [
        [
            'label' => 'Dashboard',
            'icon' => 'dashboard',
            'href' => route('asesi.dashboard'),
            'active_patterns' => ['asesi.dashboard'],
        ],
        [
            'label' => 'Sertifikasi',
            'icon' => 'workspace_premium',
            'href' => route('asesi.sertifikasi'),
            'active_patterns' => ['asesi.sertifikasi*', 'asesi.sertifikat.*', 'asesi.nilai'],
        ],
        [
            'label' => 'Transaksi',
            'icon' => 'add_card',
            'href' => route('asesi.transaksi'),
            'active_patterns' => ['asesi.transaksi*', 'payments.*'],
        ],
        [
            'label' => 'Profil',
            'icon' => 'person',
            'href' => route('asesi.profile'),
            'active_patterns' => ['asesi.profile', 'asesi.profile.*', 'asesi.password.change'],
        ],
    ];
@endphp

<nav
    class="md:hidden fixed bottom-0 left-0 right-0 bg-white/80 backdrop-blur-md px-6 py-3 flex justify-between items-center z-40 shadow-[0_-2px_10px_rgba(0,0,0,0.05)]">
    @foreach ($navItems as $item)
        @php
            $isActive = request()->routeIs(...$item['active_patterns']);
            $itemClass = $isActive ? 'text-cyan-700' : 'text-slate-400';
        @endphp

        <a class="flex flex-col items-center gap-1 transition-colors {{ $itemClass }}" href="{{ $item['href'] }}">
            <span class="material-symbols-outlined">{{ $item['icon'] }}</span>
            <span class="text-[10px] font-bold uppercase tracking-tighter">{{ $item['label'] }}</span>
        </a>
    @endforeach
</nav>
