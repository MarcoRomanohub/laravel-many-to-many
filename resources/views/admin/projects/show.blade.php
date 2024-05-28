@extends('layouts.admin')

@section('content')
    <h1> {{ $project->title }} </h1>
    <div>
        <p>Tempo di lettura : {{ $project->reading_time }}</p>
        <p>{{ $project->text }}</p>
    </div>
@endsection
