@extends('layouts.app')

@section('title', 'Contact Us | TLC')
@section('top-banner')
    <livewire:referral-banner />
    <section class="relative overflow-hidden pt-48 pb-28 ">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('images/webp/contact-us.jpeg') }}');">
        </div>
        <div class="absolute inset-0"
            style="background: linear-gradient(120deg, rgba(10,20,70,0.80) 30%, rgba(15,40,100,0.65) 50%, rgba(10,20,70,0.55) 60%);">
        </div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute -top-20 -left-10 h-56 w-56 rounded-full bg-white blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-72 w-72 rounded-full bg-[#f1e686] blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-5xl px-4 text-center text-white sm:px-6 lg:px-8">
            <p class="font-bold uppercase tracking-[0.3em] text-white text-xl">Hubungi Kami</p>
            {{-- <h1 class="mt-4 leading-tight sm:text-md">Kami siap membantu kebutuhan Anda</h1> --}}
            <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-white/85 sm:text-base">
                Jika Anda memiliki pertanyaan seputar program TLC, pendaftaran, atau kerja sama, silakan hubungi tim kami.
            </p>
        </div>
    </section>
@endsection

@section('content')
    <section class="relative bg-gradient-to-br from-slate-50 via-white to-blue-50/30 pb-16">
        {{-- Subtle background decoration --}}
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 h-80 w-80 rounded-full bg-blue-100/40 blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 h-80 w-80 rounded-full bg-indigo-100/30 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-6xl px-4 sm:px-2">
            {{-- Main split card --}}
            <div class="overflow-hidden border border-slate-200/60 bg-white shadow-xl shadow-slate-200/50">
                <div class="grid lg:grid-cols-2">

                    {{-- Left side: Google Maps card --}}
                    <div class="flex items-center justify-center bg-gradient-to-br from-slate-100 to-blue-50/50 ">
                        <div
                            class="relative aspect-square w-full max-w-full overflow-hidden border border-slate-200/60 shadow-lg shadow-slate-200/40">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.041073074036!2d114.5963201!3d-3.2287138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de43db6ef6d2405%3A0x45fce7dd24c32498!2sHAFECS%20(Highly%20Functioning%20Education%20Consulting%20Services)!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                                class="absolute inset-0 h-full w-full border-0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" title="Lokasi HAFECS di Google Maps">
                            </iframe>
                        </div>
                    </div>

                    {{-- Right side: Contact info --}}
                    <div class="flex flex-col justify-center px-8 sm:px-12 lg:px-14 md:pb-4">
                        {{-- Logo --}}
                        <div class="mb-8 flex items-center gap-4">
                            <img src="{{ asset('images/logoTlcPng.png') }}" alt="Logo TLC"
                                class="h-16 w-auto object-contain drop-shadow-sm">
                            <div>
                                <h2 class="text-xl font-bold text-slate-700">TLC</h2>
                                <p class="text-xs font-medium uppercase tracking-[0.2em] text-slate-400">
                                    {{ $companyName ?? 'Teaching & Learning Center' }}
                                </p>
                            </div>
                        </div>
                        {{-- Contact details --}}
                        <livewire:contact-form-item />

                        {{-- Divider --}}
                        <div class="my-8 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

                        {{-- Operating hours --}}
                        <div class="rounded-2xl bg-gradient-to-br from-slate-50 to-blue-50/30 p-5">
                            <p class="text-sm font-bold uppercase tracking-widest text-[#1D4E89]">Jam Operasional</p>
                            <div class="mt-4 space-y-2.5 text-sm text-slate-700">
                                <div class="flex items-center justify-between gap-4 border-b border-slate-200/60 pb-2.5">
                                    <span>Senin - Sabtu</span>
                                    <span class="font-semibold text-slate-700">08.30 - 16.30 WITA</span>
                                </div>
                                <div class="flex items-center justify-between gap-4 border-b border-slate-200/60 pb-2.5">
                                    <span>Sabtu</span>
                                    <span class="font-semibold text-slate-700">08.00 - 12.00</span>
                                </div>
                                <div class="flex items-center justify-between gap-4">
                                    <span>Minggu</span>
                                    <span class="font-semibold text-red-500">Libur</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
