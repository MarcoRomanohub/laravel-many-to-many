@extends('layouts.admin')

@section('content')
    <h1>Progetti</h1>

    @if (session('deleted'))
        <div class="alert alert-success " role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tecnologia</th>
                <th scope="col">Type</th>
                <th scope="col">Data</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->technology?->name }}</td>
                    <td>
                        @forelse ($project->types as $type)
                            <span class="badge text-bg-warning">{{ $type->name }}</span>

                        @empty
                            - no type -
                        @endforelse

                    </td>
                    <td>{{ $project->updated_at }}</td>
                    <td class=" d-flex">
                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning mx-2 ">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                            onsubmit="return confirm('Sei sicuro di voler eliminare il Progetto?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger ">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>

    {{ $projects->links('pagination::bootstrap-5') }}
@endsection
