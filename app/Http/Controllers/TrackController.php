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

    public function create()
    {
        return view('track.create', [
            'albums' => DB::table('albums')->orderBy('Title')->get(),
            'mediaTypes' => DB::table('media_types')->orderBy('Name')->get(),
            'genres' => DB::table('genres')->orderBy('Name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'album' => 'required|exists:albums,AlbumId',
            'genre' => 'required|exists:genres,GenreId',
            'mediaType' => 'required|exists:media_types,MediaTypeId',
            'price' => 'required|gt:0|decimal:2',
            'milliseconds' => 'required',
        ]);

        DB::table('tracks')->insert([
            'Name' => $request->input('name'),
            'AlbumId' => $request->input('album'),
            'GenreId' => $request->input('genre'),
            'MediaTypeId' => $request->input('mediaType'),
            'UnitPrice' => $request->input('price'),
            'Milliseconds' => $request->input('milliseconds'),
        ]);

        return redirect()
            ->route('track.index')
            ->with('success', "The track {$request->input('name')} was successfully created");
    }
}
