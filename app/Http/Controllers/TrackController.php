<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = DB::table('tracks')
            ->select([
                'tracks.Name AS track',
                'tracks.UnitPrice AS price',
                'tracks.Milliseconds AS milliseconds',
                'albums.Title AS album',
                'artists.Name AS artist',
                'media_types.Name AS mediaType',
                'genres.Name AS genre',
            ])
            ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
            ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
            ->join('genres', 'genres.GenreId', '=', 'tracks.GenreId')
            ->join('media_types', 'tracks.MediaTypeId', '=', 'media_types.MediaTypeId')
            ->orderBy('tracks.Name')
            ->get();

        return view('track/index', [
            'tracks' => $tracks,
        ]);
    }
}
