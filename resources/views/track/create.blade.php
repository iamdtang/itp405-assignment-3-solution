@extends('layout')

@section('title', 'New track')

@section('main')
    <h1>New track</h1>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('track.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="album" class="form-label">Album</label>
            <select name="album" id="album" class="form-select">
                <option value="">-- Select album --</option>
                @foreach ($albums as $album)
                    <option
                        value="{{ $album->AlbumId }}"
                        {{ (string) $album->AlbumId === old('album') ? "selected" : "" }}
                    >
                        {{ $album->Title }}
                    </option>
                @endforeach
            </select>
            @error('album')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select name="genre" id="genre" class="form-select">
                <option value="">-- Select genre --</option>
                @foreach ($genres as $genre)
                    <option
                        value="{{ $genre->GenreId }}"
                        {{ (string) $genre->GenreId === old('genre') ? "selected" : "" }}
                    >
                        {{ $genre->Name }}
                    </option>
                @endforeach
            </select>
            @error('genre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mediaType" class="form-label">Media Type</label>
            <select name="mediaType" id="mediaType" class="form-select">
                <option value="">-- Select media type --</option>
                @foreach ($mediaTypes as $mediaType)
                    <option
                        value="{{ $mediaType->MediaTypeId }}"
                        {{ (string) $mediaType->MediaTypeId === old('mediaType') ? "selected" : "" }}
                    >
                        {{ $mediaType->Name }}
                    </option>
                @endforeach
            </select>
            @error('mediaType')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="milliseconds" class="form-label">Milliseconds</label>
            <input type="number" name="milliseconds" id="milliseconds" class="form-control" value="{{ old('milliseconds') }}">
            @error('milliseconds')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>
@endsection