<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Permision;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $trainer = Trainer::all();
        return view('pengajar.invite.index', compact('trainer'));
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
        $request->validate([
        'id_bootcamp' => 'required|exists:bootcamps,id_bootcamp',
        'id_trainer' => 'required|exists:trainer,id_trainer',
        'type' => 'required|in:Invite,Request',
        ]);
    
        // Dapatkan id pengirim (auth user)
        $id_sender = auth()->user()->id;
        
        $trainer = Trainer::where('id', $id_sender)->first();
        
        if (!$trainer) {
            return redirect()->back()->with('error', 'Anda belum terdaftar sebagai Trainer.');
        }
        // dd($trainer->id_trainer);
    
        // Periksa apakah permintaan sudah ada
        $existingPermission = Permision::where('id_bootcamp', $request->id_bootcamp)
            ->where('id_trainer', $request->id_trainer)
            ->where('id_sender', $trainer->id_trainer)
            ->where('type', $request->type)
            ->first();
    
        if ($existingPermission) {
            session()->flash("pesan", "Permintaan ini sudah ada.");
            return redirect()->back()->with(['error' => 'Permintaan ini sudah ada.']);
        }
        
    
        // Buat permintaan baru berdasarkan type (Invite/Request)
        Permision::create([
            'id_bootcamp' => $request->id_bootcamp,
            'id_sender' => $trainer['id_trainer'],
            'id_trainer' => $request->id_trainer,
            'status' => 'pending',
            'type' => $request->type, // Berdasarkan pilihan user
        ]);
    
        return redirect()->route('pengajar.request.index')->with('success', 'Permintaan berhasil dikirim.');
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
    public function destroy($id_permision)
    {
        $permision = Permision::findOrFail($id_permision);
        $permision->delete();
        return redirect()->back()->with('success', 'Berhasil Membatalkan Undangan!');
    }
    public function approve($id_permision)
    {
        $permision = Permision::findOrFail($id_permision);
        $permision->status = 'approved';
        $permision->save();

        return redirect()->back()->with('success', 'Berhasil Menerima!');
    }
    public function cancel($id_permision)
    {
        $permision = Permision::findOrFail($id_permision);
        $permision->status = 'canceled';
        $permision->save();

        return redirect()->back()->with('success', 'Berhasil Menolak!');
    }
}
