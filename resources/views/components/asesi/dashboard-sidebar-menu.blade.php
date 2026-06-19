<div>
    <nav class="flex flex-col gap-1">
        <x-asesi.dashboard-sidebar-item href="{{ route('asesi.dashboard') }}" icon="Dashboard" text="Dashboard" routeName="asesi.dashboard" />
        <x-asesi.dashboard-sidebar-item href="{{ route('asesi.sertifikasi') }}" icon="workspace_premium" text="Sertifikasi" routeName="asesi.sertifikasi" />
        <x-asesi.dashboard-sidebar-item href="{{ route('asesi.transaksi') }}" icon="receipt_long" text="Transaksi" routeName="asesi.transaksi" />
        <x-asesi.dashboard-sidebar-item href="{{ route('asesi.tugas') }}" icon="auto_stories" text="Tugas Saya" routeName="asesi.tugas" />
        <x-asesi.dashboard-sidebar-item href="{{ route('asesi.coming-soon') }}" icon="local_library" text="Bahan Belajar" routeName="asesi.coming-soon"/>
        <x-asesi.dashboard-sidebar-item href="{{ route('asesi.coming-soon') }}" icon="settings" text="Pengaturan" routeName="asesi.coming-soon"/>
    </nav>
</div>

