@extends('layout')

@section('title', 'Tracks')

@section('main')
    <h1>Tracks</h1>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Track</th>
                <th>Album</th>
                <th>Artist</th>
                <th>Media Type</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tracks as $track)
                <tr>
                    <td>{{ $track->track }}</td>
                    <td>{{ $track->album }}</td>
                    <td> {{ $track->artist }}</td>
                    <td>{{ $track->mediaType }}</td>
                    <td>{{ $track->genre }}</td>
                    <td>${{ $track->price }}</td>
                    <td>
                        @php
                            $seconds = $track->milliseconds / 1000;
                            $minutes = round($seconds / 60);
                            $remainingSeconds = $seconds % 60;
                        @endphp

                        {{ $minutes }} minutes and {{ $remainingSeconds }} seconds
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection