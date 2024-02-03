<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PlaylistController extends Controller
{
    public function index()
    {
        return view('playlist/index', [
            'playlists' => DB::table('playlists')->orderBy('Name')->get(),
        ]);
    }

    public function edit($playlistId)
    {
        return view('playlist/edit', [
            'playlist' => DB::table('playlists')->where('PlaylistId', '=', $playlistId)->first(),
        ]);
    }

    public function update($playlistId, Request $request)
    {
        $request->validate([
            'name' => 'required|max:30|unique:playlists,Name',
        ]);

        $playlist = DB::table('playlists')->where('PlaylistId', '=', $playlistId)->first();   

        DB::table('playlists')
            ->where('PlaylistId', '=', $playlistId)
            ->update([
                'Name' => $request->input('name'),
            ]);

        return redirect()
            ->route('playlist.index')
            ->with('success', "The playlist {$playlist->Name} was successfully renamed to {$request->input('name')}");
    }
}
