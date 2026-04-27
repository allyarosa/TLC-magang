<nav class="flex flex-col gap-1">
    <x-asesi.dashboard-sidebar-item href="{{ route('asesi.dashboard') }}" icon="Dashboard" text="Dashboard"
        routeName="asesi.dashboard" />
    <x-asesi.dashboard-sidebar-item href="{{ 'asesi.courses' }}" icon="auto_stories" text="My Courses" />
    <x-asesi.dashboard-sidebar-item href="{{ 'asesi.courses' }}" icon="local_library" text="My Resources" />
    <x-asesi.dashboard-sidebar-item href="{{ 'asesi.certificates' }}" icon="workspace_premium" text="Certificates" />
    <x-asesi.dashboard-sidebar-item href="{{ 'asesi.transactions' }}" icon="receipt_long" text="Transactions" />
    <x-asesi.dashboard-sidebar-item href="{{ 'asesi.settings' }}" icon="settings" text="Settings" />
</nav>
