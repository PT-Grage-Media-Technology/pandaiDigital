<?php

namespace App\Http\Controllers;

use App\Models\Manajemenmodul;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class ManajemenmodulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {  
        //
        // $search = $request->search;
        // if(!empty($search)) {
        //     $manajemenmodul = Manajemenmodul::latest()
        //     ->orWhere('nama_modul', 'like', "%$search%")
        //     ->paginate(10);
        // } else {
        //     $manajemenmodul = Manajemenmodul::paginate(10);
        // }

        $search = $request->search;
        $status = $request->status;

        $query = Manajemenmodul::query();

        if (!empty($search)) {
            $query->where('nama_modul', 'like', "%$search%")->orWhere('link', 'like', "%$search%");
        }

        if (!empty($status)) {
            $query->where('status', $status);
        }

        $manajemenmodul = $query->paginate(10);

        $statuses = Manajemenmodul::select('status')
                    ->groupBy('status')
                    ->get();
  
        return view('administrator.manajemenmodul.index', compact(['manajemenmodul', 'statuses']));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $manajemenmodul = Manajemenmodul::all();
        return view('administrator.manajemenmodul.create', compact(['manajemenmodul']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $nama_modul = $request->nama_modul;
        $link = $request->link;
        $publish = $request->publish == 'Ya' ? 'Y' : 'N';
        $aktif = $request->aktif == 'Ya' ? 'Y' : 'N';
        $status = $request->status == 'admin' ? 'admin' : 'user';

        $username = $request->username ?: 'admin';
        $urutan = $request->urutan ?: 0;

        Manajemenmodul::create([
            'nama_modul' => $nama_modul,
            'link' => $link,
            'publish' => $publish,
            'aktif' => $aktif,
            'status' => $status,
            'username' => $username,
            'urutan' => $urutan,
            'static_content' => '',
            'gambar' => '',
            'link_seo' => ''
        ]);

        return response()->json([
            'url' => route('administrator.manajemenmodul.index'),
            'success' => true,
            'message' => 'Data Modul Berhasil Ditambah'
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
    public function edit(string $id):View
    {
        //
        $manajemenmodul = Manajemenmodul::findOrFail($id);

        return view('administrator.manajemenmodul.edit', compact('manajemenmodul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $manajemenmodul = Manajemenmodul::findOrFail($id);

        $nama_modul = $request->nama_modul;
        $link = $request->link;
        $publish = $request->publish == 'Y' ? 'Y' : 'N';
        $aktif = $request->aktif == 'Y' ? 'Y' : 'N';
        $status = $request->status == 'admin' ? 'admin' : 'user';


        $username = $request->username ?: 'admin';
        $urutan = $request->urutan ?: 0;

        $updateData = [
            'nama_modul' => $nama_modul,
            'link' => $link,
            'publish' => $publish,
            'aktif' => $publish,
            'aktif' => $aktif,
            'status' => $status,
            'urutan' => $urutan,
            'username' => $username,
            'static_content' => '',
            'gambar' => '',
            'link_seo' => ''
        ];

        $manajemenmodul->update($updateData);

        return response()->json([
            'url' => route('administrator.manajemenmodul.index'),
            'success' => true,
            'message' => 'Data Modul Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $manajemenmodul = Manajemenmodul::findOrFail($id);
        $manajemenmodul->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
