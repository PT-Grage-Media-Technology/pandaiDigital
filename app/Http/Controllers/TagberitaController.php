<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class TagberitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        // $search = $request->search;
        // if(!empty($search)) {
        //     $tags = Tag::latest()
        //     ->where('nama_tag', 'like', "%$search%")
        //     ->paginate(5);
        // } else {
        //     $tags = Tag::paginate(5);
        // }

        $search = $request->search;
        $nama_tag = $request->nama_tag;

        $query = Tag::query();

        if (!empty($search)) {
            $query->where('nama_tag', 'like', "%$search%");
        }

        if (!empty($nama_tag)) {
            $query->where('nama_tag', $nama_tag);
        }

        $tags = $query->paginate(10);

        $nama_tags = Tag::select('nama_tag')
                    ->groupBy('nama_tag')
                    ->get();

        return view('administrator.tagberita.index', compact(['tags', 'nama_tags']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.tagberita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama_tag' => 'required|string|max:255'
        ]);

        $username = $request->username ?: 'admin';

        Tag::create([
            'nama_tag' => $validated['nama_tag'],
            'tag_seo' => Str::slug($validated['nama_tag']),
            'username' => $username,
            'count' => 0 // Tambahkan ini
        ]);

        return response()->json([
            'url' => route('administrator.tagberita.index'),
            'success' => true,
            'message' => 'Data Tag Berita Berhasil Ditambah'
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
    public function edit(string $id_tag):View
    {
        //
        $tag = Tag::findOrFail($id_tag);
        return view('administrator.tagberita.edit', compact(['tag']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_tag)
    {
        //
        $validated = $request->validate([
            'nama_tag' => 'required|string|max:255'
        ]);

        $tag = Tag::findOrFail($id_tag);

        $nama_tag = $request->nama_tag;
        $username = $request->username ?: 'admin';

        $tag->update([
            "nama_tag" => $nama_tag,
            "tag_seo" => Str::slug($validated['nama_tag']),
            "username" => $username
        ]);

        return response()->json([
            'url' => route('administrator.tagberita.index'),
            'success' => true,
            'message' => 'Data Tag Berita Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tag)
    {
        //
        $tags = Tag::findOrFail($id_tag);

        $tags->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
