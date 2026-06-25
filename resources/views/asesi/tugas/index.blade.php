@extends('layouts.asesiDashboard')

@section('title', 'Tugas saya')

@section('content')
    <!-- Main Content Area -->

    @if ($userAccess)
        @livewire('asesi.task-list')
    @else
        <x-asesi.restricted-access :levels="$levels" />
    @endif
@endsection