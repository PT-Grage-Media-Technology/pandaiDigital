<?php

namespace App\Http\Controllers;

use App\Models\Playlistvideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class PlaylistvideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //

          
        // $search = $request->search;
        // if(!empty($search)) {
        //     $playlistvideos = Playlistvideo::latest()
        //     ->where('jdl_playlist', 'like', "%$search%")
        //     ->paginate(10);
        // } else {
        //     $playlistvideos = Playlistvideo::paginate(10);
        // }

        $search = $request->search;
        $jdl_playlist = $request->jdl_playlist;

        $query = Playlistvideo::query();

        if (!empty($search)) {
            $query->where('jdl_playlist', 'like', "%$search%");
        }

        if (!empty($jdl_playlist)) {
            $query->where('jdl_playlist', $jdl_playlist);
        }

        $playlistvideos = $query->paginate(10);

        $jdl_playlists = Playlistvideo::select('jdl_playlist')
                    ->groupBy('jdl_playlist')
                    ->get();

        return view('administrator.playlistvideo.index', compact(['playlistvideos', 'jdl_playlists']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.playlistvideo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'jdl_playlist' => 'required|string|max:255',
            'gbr_playlist' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $jdl_playlist = $request->jdl_playlist;
        $gambarName = null;

        if ($request->hasFile('gbr_playlist')) {
            $gambar = $request->file("gbr_playlist");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./img_playlist/", $gambarName);
        }

        $username = $request->username ?: 'admin';
        $aktif = $request->aktif ?? 'Y';

        Playlistvideo::create([
            "jdl_playlist" => $jdl_playlist,
            "playlist_seo" => Str::slug($validated['jdl_playlist']),
            "gbr_playlist" => $gambarName,
            "username" => $username,
            "aktif" => $aktif
        ]);

        return response()->json([
            'url' => route('administrator.playlistvideo.index'),
            'success' => true,
            'message' => 'Data Playlist Video Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_playlist):View
    {
        //
        $playlistvideos = Playlistvideo::findOrFail($id_playlist);
        return view('administrator.playlistvideo.edit', compact('playlistvideos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_playlist)
    {
        //
        $validated = $request->validate([
            'jdl_playlist' => 'required|string|max:255',
            'gbr_playlist' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $playlistvideos = Playlistvideo::findOrFail($id_playlist);

        $jdl_playlist = $request->jdl_playlist;
        $username = $request->username ?: 'admin';
        $aktif = $request->aktif ?? 'Y';

        if ($playlistvideos->gbr_playlist && file_exists("./img_playlist/" . $playlistvideos->gbr_playlist)) {
            unlink("./img_playlist/" . $playlistvideos->gbr_playlist);
        }
        
        if ($request->hasFile('gbr_playlist')) {
            $gambar = $request->file("gbr_playlist");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./img_playlist/", $gambarName);
        }

        $playlistvideos->update([
            "jdl_playlist" => $jdl_playlist,
            "playlist_seo" => Str::slug($validated['jdl_playlist']),
            "gbr_playlist" => $gambarName,
            "username" => $username,
            "aktif" => $aktif
        ]);

        return response()->json([
            'url' => route('administrator.playlistvideo.index'),
            'success' => true,
            'message' => 'Data Playlist Video Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_playlist)
    {
        //
        $playlistvideos = Playlistvideo::findOrFail($id_playlist);
        if ($playlistvideos->gbr_playlist) {
            $path = "./img_playlist/" . $playlistvideos->gbr_playlist;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $playlistvideos->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
