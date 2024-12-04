<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TemplatewebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        $search = $request->search;
        $pembuat = $request->pembuat;

        $query = Template::query();

        if (!empty($search)) {
            $query->where('pembuat', 'like', "%$search%");
        }

        if (!empty($pembuat)) {
            $query->where('pembuat', $pembuat);
        }

        $temps = $query->paginate(10);

        $pembuats = Template::select('pembuat')
                    ->groupBy('pembuat')
                    ->get();

        return view('administrator.templatewebsite.index', compact(['temps', 'pembuats']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('administrator.templatewebsite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'pembuat' => 'required|string|max:255',
            'folder' => 'required|string|max:255',
        ]);

        $username = $request->username ?: 'admin';

        // Simpan data ke database
        Template::create([
            'judul' => $validated['judul'],
            'pembuat' => $validated['pembuat'],
            'folder' => $validated['folder'],
            'username' => $username
        ]);

        return response()->json([
            'url' => route('administrator.templatewebsite.index'),
            'success' => true,
            'message' => 'Data Template Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $template = Template::where('aktif', 'Y')->first();

        if ($template) {
            return view('dinas-3.dashboard');
        }

        return view('dinas-2.layout');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_templates)
    {
        //
        $temp = Template::findOrFail($id_templates);
        return view('administrator.templatewebsite.edit', compact('temp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_templates)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'pembuat' => 'required|string|max:255',
            'folder' => 'required|string|max:255',
        ]);

        $sensor = Template::findOrFail($id_templates);

        $sensor->update([
            'judul' => $validated['judul'],
            'pembuat' => $validated['pembuat'],
            'folder' => $validated['folder'],
            'username' => 'admin',
        ]);

        return response()->json([
            'url' => route('administrator.templatewebsite.index'),
            'success' => true,
            'message' => 'Data Template Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_templates)
    {
        //
        $templs = Template::findOrFail($id_templates);

        $templs->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function active(string $id_templates)
    {
        // Ambil berita berdasarkan ID
        $template = Template::findOrFail($id_templates);

        // Periksa status saat ini dan toggle status
        $aktif = ($template->aktif === 'Y') ? 'N' : 'Y';

        // Update status
        $template->update(['aktif' => $aktif]);

        // Redirect kembali ke halaman list berita
        return redirect()->route('administrator.templatewebsite.index')->with(['success' => 'Status berita berhasil diubah.']);
    }
}
