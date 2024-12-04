<?php

namespace App\Http\Controllers;

use App\Models\Permision;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $trainer = Trainer::where('id', Auth::user()->id)->first(); // Mendapatkan objek trainer
    $id_pengajar = Auth::user()->id;
    $trainer_login = Trainer::where('id', $id_pengajar)->first();
    
    if (isset($trainer_login)) {

    $permissions = Permision::with(['trainer', 'sender'])
        ->where('id_sender', $trainer->id_trainer)
        ->orWhere('id_trainer', $trainer->id_trainer)
        ->paginate(10);

    return view('pengajar.request.index', compact('permissions', 'trainer_login',  'id_pengajar'));
    
    }else{
        return view('pengajar.materi.index', compact(['trainer_login',  'id_pengajar']));
    }
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
