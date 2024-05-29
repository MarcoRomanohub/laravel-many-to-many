@extends('layouts.admin')

@section('content')
    <h1>
        {{ $project->title }} </h1>

    @if ($project->technology)
        <p>Tecnologia: <span class="badge text-bg-success">{{ $project->technology->name }}</span></p>
    @endif

    @if (count($project->types) > 0)
        <p>Type: @foreach ($project->types as $type)
                <span class="badge text-bg-warning">{{ $type->name }}</span>
            @endforeach
        </p>
    @endif

    <div>
        <p>Tempo di lettura : {{ $project->reading_time }}</p>
        <p>{{ $project->text }}</p>
    </div>
@endsection
