@php
    $date = date_create($last_project->updated_at);
    $date_format = date_format($date, 'd/m/Y');
@endphp

@extends('layouts.admin')

@section('content')
    <h1>Sono presenti {{ $count_projects }} progetti </h1>
    <h2>Ultimo progetto: {{ $date_format }} </h2>
    <div>
        <h3>{{ $last_project->title }}</h3>
        <p>{{ $last_project->text }}</p>
    </div>
@endsection
