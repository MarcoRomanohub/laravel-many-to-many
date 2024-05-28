@extends('layouts.admin')

@section('content')
    <h1>Nuovo Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger " role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class=" w-50 " action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo(*)</label>
            <input type="text" class="form-control @error('title') is-invalid
            @enderror " id="title"
                placeholder="Titolo" name="title" value="{{ old('title') }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="reading_time" class="form-label">Tempo di lettura</label>
            <input type="number" class="form-control" id="reading_time" placeholder="Tempo di lettura" name="reading_time"
                value="{{ old('reading_time') }}">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Descrizione(*)</label>
            <textarea class="form-control  @error('text') is-invalid
            @enderror" name="text" id=""
                cols="30" rows="10">{{ old('text') }}</textarea>
            @error('text')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <button class="btn btn-success " type="submit">Invia</button>
            <button class="btn btn-warning " type="Reset">Reset</button>
        </div>

    </form>
@endsection
