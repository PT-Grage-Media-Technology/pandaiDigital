<?php

namespace App\Http\Controllers;

use App\Models\Manajemenmodul;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $search = $request->search;
    if(!empty($search)) {
        $manajemenmodul = Manajemenmodul::latest()
        ->orWhere('nama_modul', 'like', "%$search%")
        ->paginate(10);
    } else {  
        $manajemenmodul = Manajemenmodul::paginate(10);
    }

    return view('administrator.layout', compact(['manajemenmodul']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
