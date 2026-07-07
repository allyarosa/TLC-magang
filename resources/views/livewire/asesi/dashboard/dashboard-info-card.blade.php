<div
    class="lg:col-span-8 bg-white p-8 rounded-xl shadow-Ambient flex flex-col md:flex-row items-center gap-8 relative overflow-hidden">
    
    <!-- Circular Background Ornaments -->
    <div class="absolute -right-16 -bottom-16 w-64 h-64 rounded-full bg-gradient-to-tr from-brandBlue/10 to-brandGreen/30 blur-3xl pointer-events-none"></div>
    <div class="absolute -top-12 -right-12 w-48 h-48 rounded-full border-[12px] border-brandBlue/[0.03] pointer-events-none"></div>
    <div class="absolute -top-6 -right-6 w-24 h-24 rounded-full bg-brandGreen/[0.07] pointer-events-none"></div>
    <div class="absolute -bottom-6 left-1/3 w-16 h-16 rounded-full border border-dashed border-brandOrange/20 pointer-events-none"></div>
    <div class="absolute top-8 left-1/2 w-4 h-4 rounded-full bg-brandOrange/15 pointer-events-none"></div>

    <div class="flex-1 space-y-4 z-10">
        <div class="space-y-1">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold tracking-widest uppercase bg-brandGreen text-white">
                {{ $title ?? 'No Data' }}
            </span>
            <h3 class="text-2xl md:text-4xl font-display font-extrabold text-gray-700">Halo, {{ Auth::user()->name }}! 👋</h3>
        </div>
        <p class="max-w-md text-justify text-gray-700">
            {{ $description ?? 'No Data' }}
        </p>

        {{-- button logic --}}
        <div class="flex flex-wrap items-center gap-4 mt-2">
            @if ($isRoute)
                <a href="{{ route('payments.create', Hashids::encode($levels[0]->id)) }}"
                    class="bg-gradient-to-br from-brandBlue to-[#006684] text-white px-8 py-3 rounded-xl font-bold flex items-center justify-center gap-2 hover:opacity-90 transition-opacity inline-flex w-fit">
                    {{ $buttonTitle ?? 'No Data' }}
                    {{-- <x-icons :iconName="'arrow_forward'" /> --}}
                </a>
            @else
                <a href="{{ $link }}" target="_blank" rel="noopener noreferrer"
                    class="bg-gradient-to-br from-brandBlue to-[#006684] text-white px-8 py-3 rounded-xl font-bold flex items-center justify-center gap-2 hover:opacity-90 transition-opacity inline-flex w-fit">
                    {{ $buttonTitle ?? 'No Data' }}
                    {{-- <x-icons :iconName="'arrow_forward'" /> --}}
                </a>
            @endif
        </div>
    </div>

    <div class="relative w-48 h-48 flex-col items-center justify-center shrink-0 hidden md:flex">
        <img src="{{ asset('images/letter-a.png') }}" alt="{{ $levelName }}" class="w-3/4 h-3/4">

        <p class=" mt-2 text-gray-700 font-bold">{{ $levelName ?? 'No Data' }}</p>
    </div>
</div>
