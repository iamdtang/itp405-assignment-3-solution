@extends('layout')

@section('title', "Edit playlist: {$playlist->Name}")

@section('main')
    <h1>Rename playlist {{ $playlist->Name }}</h1>

    <form action="{{ route('playlist.update', [ 'id' => $playlist->PlaylistId ]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $playlist->Name) }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
@endsection