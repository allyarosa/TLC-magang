@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Penilaian Level C</h1>

    @if($asesiSubmissions->isEmpty())
        <p>Tidak ada pengajuan Level C yang perlu dinilai saat ini.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID Asesi</th>
                    <th>Nama Asesi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asesiSubmissions as $submission)
                    <tr>
                        <td>{{ $submission->user->id ?? 'N/A' }}</td>
                        <td>{{ $submission->user->name ?? 'N/A' }}</td>
                        <td>{{ $submission->status }}</td>
                        <td>
                            <a href="{{ route('asesor.gradeC.asesi', $submission->id) }}" class="btn btn-primary">Nilai</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
