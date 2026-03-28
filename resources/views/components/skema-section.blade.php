@php
    $skemaItems = [
        [
            'level' => 'A',
            'title' => 'Sertifikasi Level A',
            'description' => 'Membangun pengetahuan dasar Pedagogical Content Knowledge (PCK) dan pengembangan Higher Order Thinking Skills (HOTS) sesuai Kurikulum Merdeka.',
            'certification' => 'Teaching Knowledge Certification',
            'image' => 'images/letter-a.png',
            'bgGradient' => 'from-blue-500 to-blue-700',
            'borderColor' => 'border-blue-100',
            'titleColor' => 'text-blue-800',
            'certColor' => 'text-blue-600',
        ],
        [
            'level' => 'B',
            'title' => 'Sertifikasi Level B',
            'description' => 'Penerapan praktis PCK dan HOTS di kelas, pengembangan modul ajar inovatif, dan teknik refleksi untuk perbaikan berkelanjutan.',
            'certification' => 'Teaching Activation Certification',
            'image' => 'images/letter-b.png',
            'bgGradient' => 'from-green-500 to-green-700',
            'borderColor' => 'border-green-100',
            'titleColor' => 'text-green-800',
            'certColor' => 'text-green-600',
        ],
        [
            'level' => 'C',
            'title' => 'Sertifikasi Level C',
            'description' => 'Penguasaan komprehensif melalui lesson plan, Teaching Method Framework (TMF), dan evaluasi berbasis video recording dengan rubrik terstruktur.',
            'certification' => 'Mastery Activation Certification',
            'image' => 'images/letter-c.png',
            'bgGradient' => 'from-purple-500 to-purple-700',
            'borderColor' => 'border-purple-100',
            'titleColor' => 'text-purple-800',
            'certColor' => 'text-purple-600',
        ],
    ];
@endphp

<section id="skema"
    class="w-full px-5 py-24 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 text-gray-900 relative overflow-hidden">
    <div class="relative z-10">
        <!-- Header Section -->
        <div class="text-center mb-12 md:mb-16">
            <livewire:title-section title="Skema Sertifikasi Pengajaran Guru"
                subTitle="Tiga level sertifikasi yang
                dirancang untuk membangun kompetensi guru secara bertahap, dari
                pengetahuan dasar hingga penguasaan kelas yang komprehensif, dengan metodologi pengajaran efektif
                berbasis Kurikulum
                Merdeka" />
        </div>

        <!-- Process Timeline -->
        <div class="max-w-7xl mx-auto px-4">
            <!-- Desktop Timeline -->
            <div class="hidden lg:block relative">
                <!-- Connection Line -->
                <div
                    class="absolute top-1/2 left-0 right-0 h-1.5 bg-gradient-to-r from-blue-500 via-green-500 to-purple-500 rounded-full transform -translate-y-1/2 z-0">
                </div>

                <div class="grid grid-cols-3 gap-2 relative z-10">
                    @foreach ($skemaItems as $item)
                        <x-skema-card
                            :level="$item['level']"
                            :title="$item['title']"
                            :description="$item['description']"
                            :certification="$item['certification']"
                            :image="$item['image']"
                            :bgGradient="$item['bgGradient']"
                            :borderColor="$item['borderColor']"
                            :titleColor="$item['titleColor']"
                            :certColor="$item['certColor']"
                        />
                    @endforeach
                </div>
            </div>

            <!-- Mobile/Tablet Timeline -->
            <div class="lg:hidden space-y-6 max-w-2xl mx-auto">
                @foreach ($skemaItems as $index => $item)
                    <x-skema-card
                        isMobile
                        :level="$item['level']"
                        :title="$item['title']"
                        :description="$item['description']"
                        :certification="$item['certification']"
                        :image="$item['image']"
                        :bgGradient="$item['bgGradient']"
                        :borderColor="$item['borderColor']"
                        :titleColor="$item['titleColor']"
                        :certColor="$item['certColor']"
                    />

                    @if (!$loop->last)
                        <!-- Connector Arrow -->
                        <div class="flex justify-center -my-2">
                            <svg class="w-6 h-6 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
