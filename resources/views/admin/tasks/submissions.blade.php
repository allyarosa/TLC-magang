@extends('layouts.adminDashboard')

@section('title', 'Jawaban Tugas Asesi')

@section('content')
<div class="p-4 bg-white rounded-lg mb-2">
    <nav class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mt-4 text-base">
        <div class="flex flex-wrap items-center gap-3">
            <h1 class="text-xl font-bold text-gray-800">Jawaban Asesi: {{ Str::limit($task->title, 50) }}</h1>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.tasks.index') }}">
                <button class="px-3 py-1.5 bg-gray-600 text-white text-sm rounded hover:bg-gray-700">
                    Kembali ke Daftar Tugas
                </button>
            </a>
        </div>
    </nav>
</div>

<div class="bg-indigo-50 border-l-4 border-indigo-400 p-4 mb-6 rounded-r-md">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <p class="text-sm text-indigo-700">
                <strong>Batch:</strong> {{ $task->batch?->name ?? '-' }} &bull; 
                <strong>Kategori:</strong> {{ $task->category_label }} &bull; 
                <strong>Batas Waktu:</strong> {{ $task->ends_at?->format('d M Y H:i') ?? '-' }} &bull;
                <strong>Maks Submit:</strong> {{ $task->max_submissions }} kali
            </p>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-600">
                <tr>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">No</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Nama Asesi</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Email</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Submit Ke</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">Waktu Submit</th>
                    <th class="px-4 py-3 text-xs font-medium text-left text-white uppercase tracking-wider">File Jawaban</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($submissions as $submission)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration + $submissions->firstItem() - 1 }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $submission->user->name }}</div>
                            <div class="text-xs text-gray-500">{{ $submission->user->userProfile->instansi ?? '-' }}</div>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $submission->user->email }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 text-center">
                            <span class="px-2 py-1 bg-gray-100 rounded-full text-xs font-semibold">{{ $submission->submission_count }} / {{ $task->max_submissions }}</span>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                            {{ $submission->submitted_at ? \Carbon\Carbon::parse($submission->submitted_at)->format('d M Y H:i:s') : '-' }}
                            @if($task->ends_at && $submission->submitted_at && \Carbon\Carbon::parse($submission->submitted_at)->gt($task->ends_at))
                                <span class="ml-1 text-[10px] text-red-600 bg-red-100 px-1 py-0.5 rounded">Terlambat</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.tasks.submissions.download', $submission->id) }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">Belum ada asesi yang mengirimkan jawaban untuk tugas ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-4">
    {{ $submissions->links() }}
</div>
@endsection
