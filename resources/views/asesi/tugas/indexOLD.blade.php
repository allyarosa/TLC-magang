@extends('layouts.asesiDashboard')

@section('title', 'Tugas Saya')

@section('content')
<div class="p-4 bg-white rounded-lg mb-4 shadow-sm">
    <h1 class="text-2xl font-bold text-gray-800">Tugas Saya</h1>
    <p class="text-sm text-gray-500 mt-1">Selesaikan tugas-tugas di bawah ini dengan mengunggah file jawaban (Maks. 8MB per tugas).</p>
</div>

@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 shadow-sm" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 shadow-sm" role="alert">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 shadow-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(!$batch)
    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 text-center">
        <div class="w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        </div>
        <h3 class="text-lg font-bold text-gray-800 mb-2">Belum Ada Angkatan</h3>
        <p class="text-gray-600">Saat ini Anda tidak terdaftar pada batch/angkatan tugas apapun. Silakan hubungi admin.</p>
    </div>
@elseif($tasks->isEmpty())
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 text-center md:ml-60">
        <div class="w-16 h-16 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        </div>
        <h3 class="text-lg font-bold text-gray-800 mb-2">Belum Ada Tugas</h3>
        <p class="text-gray-600">Saat ini belum ada soal/tugas yang tersedia untuk Anda pada batch ini.</p>
    </div>
@else
    <div class="grid grid-cols-1 gap-6">
        @foreach($tasks as $task)
            @php
                $submission = $submissions->get($task->id);
                $isSubmitted = $submission != null;
                $submitCount = $isSubmitted ? $submission->submission_count : 0;
                $canSubmit = $task->isActive() && ($submitCount < $task->max_submissions);
                $isExpired = !$task->isActive();
            @endphp
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                <!-- Header Tugas -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">{{ $task->title }}</h3>
                        <div class="flex items-center gap-3 mt-1 text-xs text-gray-500">
                            <span class="bg-white px-2 py-1 rounded shadow-sm border border-gray-100">{{ $task->category }}</span>
                            <span>Batas Akhir: <strong class="text-red-500">{{ $task->ends_at->format('d M Y H:i') }}</strong></span>
                        </div>
                    </div>
                    <div>
                        @if($isSubmitted)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <svg class="mr-1.5 h-4 w-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                Sudah Mengumpulkan
                            </span>
                        @elseif($isExpired)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                Waktu Habis
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                Belum Mengumpulkan
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Isi Tugas -->
                <div class="p-6">
                    <div class="prose max-w-none text-gray-700 text-sm mb-4">{!! $task->body !!}</div>
                    
                    @if($task->image_path)
                        <div class="mb-6 mt-4">
                            <p class="text-xs font-semibold text-gray-500 mb-2 uppercase tracking-wide">Lampiran Gambar:</p>
                            <img src="{{ asset('storage/' . $task->image_path) }}" alt="Gambar Soal" class="rounded border border-gray-200 max-h-64 object-contain">
                        </div>
                    @endif

                    <hr class="my-4 border-gray-100">

                    <!-- Area Submit -->
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <div class="flex justify-between items-center mb-3">
                            <h4 class="font-bold text-sm text-gray-800">Upload Jawaban</h4>
                            <span class="text-xs text-gray-500">
                                Status: <strong class="{{ $submitCount > 0 ? 'text-indigo-600' : 'text-gray-600' }}">{{ $submitCount }} / {{ $task->max_submissions }}</strong> Kali Submit
                            </span>
                        </div>

                        @if($isSubmitted)
                            <div class="mb-4 text-sm text-gray-600 bg-white p-3 rounded border border-green-200 flex items-center justify-between">
                                <div>
                                    <span class="block text-xs text-gray-500">Jawaban terakhir dikirim:</span>
                                    <strong>{{ \Carbon\Carbon::parse($submission->submitted_at)->format('d M Y H:i:s') }}</strong>
                                </div>
                                <span class="text-green-600 flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Tersimpan
                                </span>
                            </div>
                        @endif

                        @if($canSubmit)
                            <form action="{{ route('asesi.tugas.submit', $task->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="flex items-center gap-3">
                                    <div class="flex-1">
                                        <input type="file" name="file_jawaban" required accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png"
                                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-300 rounded-md">
                                        <p class="mt-1 text-[11px] text-gray-500">Maks. 8MB. Format: PDF, DOCX, XLSX, PPTX, JPG, PNG.</p>
                                    </div>
                                    <button type="submit" class="px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 shadow-sm whitespace-nowrap self-start mt-0.5">
                                        {{ $isSubmitted ? 'Upload Ulang' : 'Kirim Jawaban' }}
                                    </button>
                                </div>
                            </form>
                        @else
                            @if(!$task->isActive())
                                <p class="text-sm text-red-600 font-medium">Tugas ini sudah tidak dapat dikerjakan (Waktu Habis).</p>
                            @else
                                <p class="text-sm text-gray-600 font-medium">Anda telah mencapai batas maksimal upload jawaban.</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
