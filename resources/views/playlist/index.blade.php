@extends('layout')

@section('title', 'Playlists')

@section('main')
    <h1>Playlists</h1>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($playlists as $playlist)
                <tr>
                    <td>
                        {{ $playlist->Name }}
                    </td>
                    <td>
                        <a href="{{ route('playlist.edit', [ 'id' => $playlist->PlaylistId ]) }}">
                            Rename
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
