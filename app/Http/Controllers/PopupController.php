<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $query = Popup::query();
    
        if (!empty($search)) {
            $query->where('pesan', 'like', "%$search%");
        }
    
        $popups = $query->with('trainer')->paginate(10); // Ini adalah objek paginator
    
        return view('administrator.popup.index', compact('popups')); // Mengirimkan objek paginator
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainers = Trainer::all();
        return view('administrator.popup.create',compact('trainers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'pesan' => 'required|string',
            'id_trainer' => 'nullable|exists:trainer,id_trainer',
        ]);

        $data = $validatedData;
        $data['id_pop_up'] = Str::uuid();

        Popup::create($data);

        return response()->json([
            'url' => route('administrator.popup.index'),
            'success' => true,
            'message' => 'Data popup berhasil ditambah',
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
    public function edit(string $id)
    {
        //
        $trainers = Trainer::all();
        $popup = Popup::findOrFail($id);
        return view('administrator.popup.edit', compact('popup','trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pop_up)
    {
        //
        $popup = Popup::findOrFail($id_pop_up);

        $validatedData = $request->validate([
            'pesan' => 'required|string',
            'id_trainer' => 'nullable|exists:trainer,id_trainer',
        ]);

        $popup->update($validatedData);

        return response()->json([
            'url' => route('administrator.popup.index'),
            'success' => true,
            'message' => 'Data popup berhasil diubah',
            'data' => $popup,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pop_up)
    {
        //
        $popup = Popup::findOrFail($id_pop_up);
        $popup->delete();

        return response()->json(['message' => 'Data Topik berhasil dihapus.']);
    }
}
