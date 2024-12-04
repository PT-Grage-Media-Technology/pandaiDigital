<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use App\Models\Payment;
use App\Models\Trainer;
use App\Models\Permision;
use App\Models\Tugasbootcamp;
use App\Models\Materibootcamp;
use App\Models\Benefitbootcamp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $judul_bootcamp = $request->judul_bootcamp;

        // Eager load trainerAdmin
        $query = Bootcamp::query()->with('trainerAdmin');

        if (!empty($search)) {
            $query->where('judul_bootcamp', 'like', "%$search%");
        }

        if (!empty($judul_bootcamp)) {
            $query->where('judul_bootcamp', $judul_bootcamp);
        }

        $bootcamps = $query->paginate(10);
        $judul_bootcamps = Bootcamp::select('judul_bootcamp')->groupBy('judul_bootcamp')->get();

        // Decode id_trainer and id_benefitcamps if needed
        foreach ($bootcamps as $bootcamp) {
            if (is_string($bootcamp->id_trainer)) {
                $bootcamp->id_trainer = json_decode($bootcamp->id_trainer, true);
            }
            $bootcamp->id_benefitcamps = json_decode($bootcamp->id_benefitcamps) ?? [];
        }

        return view('administrator.bootcamps.index', compact('bootcamps', 'judul_bootcamps'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $trainers = Trainer::all();
        $benefits = Benefitbootcamp::all();

        return view('administrator.bootcamps.create', compact('benefits', 'trainers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_bootcamp' => 'required|string|max:255',
            'harga' => 'required',
            'harga_diskon' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'deskripsi' => 'required',
            'id_benefitcamps' => 'nullable|array',
            'id_trainer' => 'nullable|integer|exists:trainer,id_trainer',
        ]);

        $data = $request->all();
        $data['id_benefitcamps'] = json_encode($request->input('id_benefitcamps'));
        $data['id_bootcamp'] = Str::uuid();

        // Save thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file("thumbnail");
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnail->move("./thumbnail_bootcamp/", $thumbnailName);
        }

        Bootcamp::create([
            "id_bootcamp" => $data['id_bootcamp'],
            "judul_bootcamp" => $data['judul_bootcamp'],
            "harga" => $data['harga'],
            "harga_diskon" => $data['harga_diskon'],
            "deskripsi" => $data['deskripsi'],
            "thumbnail" => $thumbnailName,
            'id_benefitcamps' => $data['id_benefitcamps'],
            'id_trainer' => $request->id_trainer, // Simpan langsung sebagai integer
        ]);

        return response()->json([
            'url' => route('administrator.bootcamps.index'),
            'success' => true,
            'message' => 'Data Bootcamp Berhasil Ditambah'
        ]);
    }


    /**
     * Display the specified resource.
     */

    public function show(string $id_bootcamp)
    {
        // Cek apakah user sudah terautentikasi
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Ambil pembayaran terkait bootcamp
        $bootcampPayments = DB::table('payments')
            ->join('bootcamps', 'payments.berlangganan_id', '=', 'bootcamps.id_bootcamp')
            ->where('id_user', $user->id)
            ->where('payments.program_name', 'like', '%Paket Bootcamp%')
            ->where('payments.status', 'completed')
            ->select('payments.*', 'bootcamps.judul_bootcamp as nama_berlangganan')
            ->get();

        // Ambil data bootcamp beserta data trainer dan batch yang terkait
        $bootcamp = Bootcamp::with(['trainer', 'batch', 'materibootcamp', 'tugasbootcamp'])->findOrFail($id_bootcamp);
        // dd($bootcamp);

        // Ambil data trainer berdasarkan id_trainer
        $trainers = $bootcamp->trainer;



        // Ambil benefit bootcamp
        $benefits = $bootcamp->benefit(); // Call the method benefit()



        // Ambil semua bootcamp
        $bootcamps = Bootcamp::all();
        $materis = $bootcamp->materibootcamp->sortBy('live_date');
        $tasks = $bootcamp->tugasbootcamp; // Already loaded due to eager loading

        // Cek jika user berlangganan bootcamp ini
        $isSubscribed = $bootcampPayments->contains('berlangganan_id', $bootcamp->id_bootcamp);

        $isTrainer = $user->level === 'pengajar' && $user->id === $bootcamp->trainer[0]->id;

        // Mengambil data Permission yang sesuai dengan kondisi
        $permissions = Permision::where('status', 'approved')
            ->where('id_bootcamp', $id_bootcamp)
            ->get();

        foreach ($permissions as $permission) {
            // Pastikan properti adalah nilai tunggal
            $trainers = collect([
                $bootcamp->trainer->first() ?? null, // Ambil object trainer pertama
                \App\Models\Trainer::find($permission->id_trainer), // Ambil object berdasarkan id_trainer
                \App\Models\Trainer::find($permission->id_sender), // Ambil object berdasarkan id_sender
            ])->filter()->unique('id'); // Filter null dan duplikat berdasarkan ID
        }


        // Mendapatkan data Trainer yang sesuai dengan pengguna yang sedang di-auth
        $trainer = Trainer::where('id', Auth::user()->id)->first();

        // Memeriksa apakah pengguna adalah pengajar dan apakah trainer sesuai dengan permission
        $isContributor = false; // Inisialisasi dengan false
        if ($user->level === 'pengajar') {
            foreach ($permissions as $permission) {
                if ($trainer->id_trainer == $permission->id_trainer || $trainer->id_trainer == $permission->id_sender) {
                    $isContributor = true; // Jika ada yang cocok, set menjadi true
                    break; // Keluar dari loop jika sudah ditemukan
                }
            }
        }
        

        // dd($permissions);

        // Kirim data ke view
        return view('myskill.pages.program.digital-marketing', compact('isContributor', 'permissions', 'bootcamp', 'bootcamps', 'bootcampPayments', 'isSubscribed', 'materis', 'tasks', 'trainers', 'benefits', 'isTrainer'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_bootcamp)
    {
        $bootcamps = Bootcamp::findOrFail($id_bootcamp);

        // Cek apakah id_benefitcamps sudah berupa array, jika tidak, decode JSON-nya
        if (!is_array($bootcamps->id_benefitcamps)) {
            $bootcamps->id_benefitcamps = json_decode($bootcamps->id_benefitcamps, true) ?? [];
        }

        // Cek apakah id_trainer sudah berupa array, jika tidak, decode JSON-nya
        if (!is_array($bootcamps->id_trainer)) {
            $bootcamps->id_trainer = json_decode($bootcamps->id_trainer, true) ?? [];
        }

        $benefits = Benefitbootcamp::all();
        $trainers = Trainer::all();

        return view('administrator.bootcamps.edit', compact('bootcamps', 'benefits', 'trainers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'judul_bootcamp' => 'required|string|max:255',
            'harga' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'harga_diskon' => 'nullable',
            'deskripsi' => 'required',
            'id_benefitcamps' => 'nullable|array',
            'id_trainer' => 'nullable|integer|exists:trainer,id_trainer',
        ]);

        $bootcamps = Bootcamp::findorfail($id);
        $bootcamps->judul_bootcamp = $validatedData['judul_bootcamp'];
        $bootcamps->harga = $validatedData['harga'];
        $bootcamps->harga_diskon = $validatedData['harga_diskon'];
        $bootcamps->deskripsi = $validatedData['deskripsi'];
        $bootcamps->id_benefitcamps = json_encode($request->input('id_benefitcamps'));
        $bootcamps->id_trainer = $request->input('id_trainer'); // Simpan langsung sebagai integer

        // Save thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($bootcamps->thumbnail) {
                $path = "./thumbnail_bootcamp/" . $bootcamps->thumbnail;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $thumbnail = $request->file("thumbnail");
            $thumbnailName = $thumbnail->getClientOriginalName();
            $thumbnail->move("./thumbnail_bootcamp/", $thumbnailName);
            $bootcamps->thumbnail = $thumbnailName;
        }

        $bootcamps->save();

        return response()->json([
            'url' => route('administrator.bootcamps.index'),
            'success' => true,
            'message' => 'Data Bootcamp Berhasil Diperbarui'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $bootcamps = Bootcamp::findOrFail($id);
        if ($bootcamps->thumbnail) {
            $path = "./thumbnail_bootcamp/" . $bootcamps->thumbnail;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $bootcamps->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
