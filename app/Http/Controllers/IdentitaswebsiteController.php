<?php

namespace App\Http\Controllers;

use App\Models\Identitaswebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class IdentitaswebsiteController extends Controller
{
    /**
     * Menampilkan form edit identitas website.
     */
    public function edit(): View
    {
        $identitaswebsite = Identitaswebsite::first();
        return view('administrator.identitaswebsite.edit', compact('identitaswebsite'));
        
    }

    /**
     * Update identitas website.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            "ceo" => 'required|string|max:255',
            "nama_website" => 'required|string|max:255',
            "email" => 'required|email',
            "domain" => 'required|url',
            "sosial_media" => 'required|url',
            "rekening" => 'required',
            "no_telp" => 'required',
            "meta_deskripsi" => 'required',
            "meta_keyword" => 'required',
            "alamat" => 'required',
            "maps" => 'required|url',
            "favicon" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            "ttd" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            "cap" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10064'
        ]);

        $identitaswebsite = Identitaswebsite::first(); // Mengambil identitas pertama
       
        // Tetapkan favicon lama terlebih dahulu
        $faviconName = $identitaswebsite->favicon;
        
        if ($request->hasFile('favicon')) {
            // Jika ada file favicon yang di-upload
            $favicon = $request->file("favicon");
            $faviconName =$favicon->getClientOriginalName();
            
            // Simpan file favicon baru ke direktori yang ditentukan
            $favicon->move(base_path('public_html/foto_identitas'), $faviconName);
            
            // Menghapus favicon lama jika ada
            if ($identitaswebsite->favicon) {
                $oldFaviconPath = base_path('public_html/foto_identitas/' . $identitaswebsite->favicon);
                
                // Cek apakah file favicon lama ada dan hapus
                if (file_exists($oldFaviconPath)) {
                    unlink($oldFaviconPath);
                }
            }
        }
        
        
        $ttdName = $identitaswebsite->ttd;
        
        if ($request->hasFile('ttd')) {
            // Jika ada file tanda tangan yang di-upload
            $ttd = $request->file("ttd");
            $ttdName = $ttd->getClientOriginalName();
            
            // Simpan file favicon baru ke direktori yang ditentukan
            $ttd->move(base_path('public_html/foto_ttd'), $ttdName);
            
            // Menghapus favicon lama jika ada
            if ($identitaswebsite->ttd) {
                $oldTtdPath = base_path('public_html/foto_ttd/' . $identitaswebsite->ttd);
                
                // Cek apakah file favicon lama ada dan hapus
                if (file_exists($oldTtdPath)) {
                    unlink($oldTtdPath);
                }
            }
        }
        
        
        $capName = $identitaswebsite->cap;
        
        if ($request->hasFile('cap')) {
            // Jika ada file tanda tangan yang di-upload
            $cap = $request->file("cap");
            $capName = $cap->getClientOriginalName();
            
            // Simpan file favicon baru ke direktori yang ditentukan
            $cap->move(base_path('public_html/cap'), $capName);
            
            // Menghapus favicon lama jika ada
            if ($identitaswebsite->cap) {
                $oldCapPath = base_path('public_html/cap/' . $identitaswebsite->cap);
                
                // Cek apakah file favicon lama ada dan hapus
                if (file_exists($oldCapPath)) {
                    unlink($oldCapPath);
                }
            }
        }
        
        // Update data website
        $identitaswebsite->update([
            "ceo" => $validated['ceo'],
            "nama_website" => $validated['nama_website'],
            "email" => $validated['email'],
            "url" => $validated['domain'],
            "facebook" => $validated['sosial_media'],
            "rekening" => $validated['rekening'],
            "no_telp" => $validated['no_telp'],
            "meta_deskripsi" => $validated['meta_deskripsi'],
            "meta_keyword" => $validated['meta_keyword'],
            "maps" => $validated['maps'],
            "alamat" => $validated['alamat'],
            "favicon" => $faviconName,// Gunakan nama favicon lama atau baru
            "ttd" => $ttdName,// Gunakan nama tanda tangan lama atau baru
            "cap" => $capName, // Gunakan nama cap lama atau baru
        ]);
        
        return response()->json([
            'url' => route('administrator.identitaswebsite.edit'),
            'success' => true,
            'message' => 'Data Identitas Berhasil Diperbarui'
        ]);

}
}