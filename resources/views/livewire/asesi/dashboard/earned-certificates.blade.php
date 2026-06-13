<div class="lg:col-span-8">
    <h3 class="text-lg font-display font-bold text-gray-800 mb-6 tracking-wide">SERTIFIKAT DIRAIH</h3>
    
    <div class="space-y-4">
        @forelse ($certificates as $item)
            @php
                $certName = $item->name;
                $type = null;
                $displayName = 'Sertifikat Level A';
                $badgeText = 'Sertifikat Utama';
                
                if (str_contains($certName, 'Ctk.HOTS')) {
                    $type = 'HOTS';
                    $displayName = 'Sub-Sertifikat: High Order Thinking Skills (HOTS)';
                    $badgeText = 'Sub-Sertifikat';
                } elseif (str_contains($certName, 'Ctk.PCK')) {
                    $type = 'PCK';
                    $displayName = 'Sub-Sertifikat: Pedagogical Content Knowledge (PCK)';
                    $badgeText = 'Sub-Sertifikat';
                } elseif (str_contains($certName, 'Ctk.LN')) {
                    $type = 'LN';
                    $displayName = 'Sub-Sertifikat: Literasi & Numerasi (LN)';
                    $badgeText = 'Sub-Sertifikat';
                } elseif (str_contains($certName, 'CTK')) {
                    $displayName = 'Sertifikat Utama: Level A';
                    $badgeText = 'Verified Professional';
                }
                
                $issueDate = $item->issue_date ? $item->issue_date->translatedFormat('d F Y') : $item->created_at->translatedFormat('d F Y');
                $downloadUrl = route('asesi.downloadCertificate', [
                    'id' => \Vinkla\Hashids\Facades\Hashids::encode(Auth::id()),
                    'type' => $type
                ]);
            @endphp
            
            <div class="bg-white rounded-xl p-6 py-8 flex flex-col md:flex-row items-center gap-6 border border-outline-variant/20 shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="w-full md:w-48 aspect-[1.4/1] bg-slate-50 rounded-lg border border-slate-200 flex items-center justify-center relative overflow-hidden shrink-0">
                    <span class="material-symbols-outlined text-6xl text-primary/20">workspace_premium</span>
                    <div class="absolute inset-0 bg-gradient-to-tr from-primary/5 to-transparent"></div>
                </div>
                
                <div class="flex-1 text-center md:text-left">
                    <div class="mb-4">
                        <span class="inline-flex px-2 py-1 rounded text-[10px] font-bold bg-brandGreen/30 text-brandGreen-dark uppercase mb-2">
                            {{ $badgeText }}
                        </span>
                        <h4 class="text-xl font-bold text-gray-800">{{ $displayName }}</h4>
                        <p class="text-sm text-gray-600 mt-1">
                            Diterbitkan pada {{ $issueDate }} • ID: {{ $item->certificate_number }}
                        </p>
                    </div>
                    
                    <div class="flex flex-wrap justify-center md:justify-start gap-3">
                        <a href="{{ $downloadUrl }}" class="flex items-center gap-2 bg-brandBlue text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-primary-container transition-colors shadow-sm">
                            <span class="material-symbols-outlined text-lg">download</span>
                            Unduh Sertifikat
                        </a>
                        
                        <button x-data="{ url: '{{ $downloadUrl }}' }" @click="navigator.clipboard.writeText(url); alert('Tautan unduhan sertifikat berhasil disalin ke papan klip!')" class="flex items-center gap-2 border border-outline text-gray-800 px-5 py-2 rounded-lg text-sm font-bold hover:bg-slate-50 transition-colors">
                            <span class="material-symbols-outlined text-lg">share</span>
                            Bagikan
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl py-10 px-12 flex flex-col items-center justify-center text-center border border-dashed border-outline-variant/30">
                <div class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mb-4 border border-dashed border-slate-200">
                    <span class="material-symbols-outlined text-5xl">card_membership</span>
                </div>
                <h4 class="font-bold text-gray-700">Belum Ada Sertifikat</h4>
                <p class="text-sm text-gray-500 max-w-xs mt-2">
                    Selesaikan Level A untuk mendapatkan sertifikat profesional pertamamu!
                </p>
                {{-- <a href="{{ route('asesi.sertifikasi') }}" class="mt-6 text-primary font-bold text-sm flex items-center gap-2 hover:underline">
                    Lihat Syarat Sertifikasi
                    <span class="material-symbols-outlined text-sm">open_in_new</span>
                </a> --}}
            </div>
        @endforelse
    </div>
</div>
