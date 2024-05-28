@extends('layouts.admin')

@section('content')
    <h2>Tipologie</h2>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class=" my-4">
        <form class="d-flex" action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <input type="search" class="form-control me-2 " placeholder="Nuova Tipologia" name="name">
            <button class="btn btn-outline-success" type="submit">Invia</button>
        </form>
    </div>

    <table class="table crud-table">
        <thead>
            <tr>
                <th scope="col">Tipologie</th>
                <th scope="col">Azioni</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>
                        <form action="{{ route('admin.types.update', $type) }}" method="POST"
                            id="form-edit-{{ $type->id }}">
                            @csrf
                            @method('PUT')
                            <input type="text" value="{{ $type->name }}" name="name">
                        </form>
                    </td>
                    <td class=" d-flex ">
                        <button class="btn btn-warning me-1" onclick="submitForm({{ $type->id }})">
                            <i class="fa-solid fa-pencil"></i>
                        </button>

                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST"
                            onsubmit="return confirm('Sei sicuro di voler eliminare la Tipologia?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger ">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <script>
        function submitForm(id) {
            const form = document.getElementById(`form-edit-${id}`);
            form.submit();
        }
    </script>
@endsection
