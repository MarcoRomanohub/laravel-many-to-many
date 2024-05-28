@extends('layouts.admin')

@section('content')
    <h1>Elenco Tecnologie </h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tecnologia</th>
                <th scope="col">Progetti</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td>{{ $technology->name }}</td>
                    <td>
                        <ul class="list-group">
                            @foreach ($technology->projects as $project)
                                <li class="list-group-item">
                                    <a href="{{ route('admin.projects.show', $project) }}">
                                        {{ $project->id }} - {{ $project->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
