<?php

namespace App\Http\Controllers;

use App\Mail\SendUserMessage;
use App\Models\User;
use App\Models\Payment;
use App\Models\UserModul;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Manajemenmodul;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ManajemenuserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $search = $request->search;
        $level = $request->level;

        $query = User::query();

        if (!empty($search)) {
            $query->where('username', 'like', "%$search%")->orWhere('nama_lengkap', 'like', "%$search%")->orWhere('email', 'like', "%$search%")->orWhere('no_telp', 'like', "%$search%");
        }

        if (!empty($level)) {
            $query->where('level', $level);
        }

        $users = $query->paginate(10);

        // Ambil semua data user dari database
        $usersAll = User::all();

        // Membagi data menjadi array dengan maksimal 30 elemen per array
        $chunkedUsers = $usersAll->chunk(30);
        $countUsers = count($chunkedUsers);

        $levels = User::select('level')
            ->groupBy('level')
            ->get();

        foreach ($users as $user) {
            $user->latestPayment = Payment::where('id_user', $user->id)->latest()->first();
        }


        return view('administrator.manajemenuser.index', compact(['users', 'levels', 'countUsers']));
    }

    public function delete_akses(string $id_umod, string $user_id): RedirectResponse
    {
        // Hapus akses modul pengguna
        UserModul::where('id_umod', $id_umod)->delete();

        // Redirect kembali ke halaman edit pengguna
        return redirect()->route('administrator.manajemenuser.edit', $user_id)
            ->with('success', 'Akses modul berhasil dihapus');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        $moduls = Manajemenmodul::all();
        return view('administrator.manajemenuser.create', compact(['moduls']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        // dd($request->all());
        $validated = $request->validate([
            "username" => 'required|string|max:255',
            "email" => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'is_subscribed' => 'required|boolean', // Validasi untuk is_subscribed
            'paket_langganan' => 'nullable|string', // Validasi untuk paket_langganan
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $username = $request->username;
        $level = $request->level;
        $no_telp = $request->no_telp;

        $fotoName = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file("foto");
            $fotoName = $foto->getClientOriginalName();
            $foto->move("./foto_user/", $fotoName);
        }

        if ($request->nama_modul != '') {
            $link = $request->nama_modul;
            $nama_modul = implode(',', $link);
        } else {
            $nama_modul = '';
        }

        // Simpan data ke database
        User::create([
            "username" => $username,
            "nama_lengkap" => $request->nama_lengkap,
            "email" => $request->email,
            "password" => $validated['password'],
            "level" => $level,
            "foto" => $fotoName,
            "no_telp" => $no_telp,
            "nama_modul" => $nama_modul,
            "blokir" => 'N',
            "id_session" => md5($username . '-' . date('YmdHis')),
            "is_subscribed" => $validated['is_subscribed'], // Menggunakan data yang sudah divalidasi
            "paket_langganan" => $request->paket_langganan // Menggunakan paket_langganan dari request
        ]);

        $mod = count($request->modul);
        $modul = $request->modul;
        $sess = md5($username . '-' . date('YmdHis'));
        for ($i = 0; $i < $mod; $i++) {
            UserModul::create([
                'id_session' => $sess,
                'id_modul' => $modul[$i]
            ]);
        }

        return response()->json([
            'url' => route('administrator.manajemenuser.index'),
            'success' => true,
            'message' => 'Data User Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function email(Request $request)
    {
        // Ambil semua data user dari database
        $usersAll = User::whereNotNull('email')->get();

        // Membagi data menjadi array dengan maksimal 30 elemen per array
        $chunkedUsers = $usersAll->chunk(30);

        $users = $chunkedUsers[$request->selected_user];

        foreach ($users as $user) {
            // Decode paket langganan dari JSON ke array
            $paketLangganan = json_decode($user->paket_langganan, true);

            // Siapkan daftar paket yang ingin ditampilkan
            $paketList = '';
            if (is_array($paketLangganan) && !empty($paketLangganan)) {
                foreach ($paketLangganan as $paket) {
                    $paketList .= '- ' . $paket . "\n"; // Setiap paket ditampilkan dalam baris baru
                }
            } else {
                $paketList = 'Yahh.. Anda belum memiliki paket langganan';
            }

            // Buat logika untuk tampilan berdasarkan paket yang dimiliki
            $hasElearning = strpos($paketList, 'E-Learning') !== false;
            $hasBootcamp = strpos($paketList, 'Bootcamp') !== false;
            $hasReviewCV = strpos($paketList, 'Review CV') !== false;

            if ($hasElearning && $hasBootcamp && $hasReviewCV) {
                $body = "Anda memiliki paket E-learning, Bootcamp, dan Review CV.";
            } elseif ($hasElearning && $hasBootcamp && !$hasReviewCV) {
                $body = "Anda memiliki paket E-learning dan Bootcamp, belum memiliki paket Review CV.";
            } elseif ($hasElearning && !$hasBootcamp && $hasReviewCV) {
                $body = "Anda memiliki paket E-learning dan Review CV, belum memiliki paket Bootcamp.";
            } elseif (!$hasElearning && $hasBootcamp && $hasReviewCV) {
                $body = "Anda memiliki paket Bootcamp dan Review CV, belum memiliki paket E-learning.";
            } elseif ($hasElearning && !$hasBootcamp && !$hasReviewCV) {
                $body = "Anda memiliki paket E-learning, belum memiliki paket Bootcamp dan Review CV.";
            } elseif (!$hasElearning && $hasBootcamp && !$hasReviewCV) {
                $body = "Anda memiliki paket Bootcamp, belum memiliki paket E-learning dan Review CV.";
            } elseif (!$hasElearning && !$hasBootcamp && $hasReviewCV) {
                $body = "Anda memiliki paket Review CV, belum memiliki paket E-learning dan Bootcamp.";
            } elseif (!$hasElearning && !$hasBootcamp && !$hasReviewCV) {
                $body = "Anda belum memiliki paket E-learning, Bootcamp, maupun Review CV.";
            } elseif ($hasElearning && $hasReviewCV && !$hasBootcamp) {
                $body = "Anda memiliki paket E-learning dan Review CV, belum memiliki paket Bootcamp.";
            } elseif ($hasBootcamp && $hasReviewCV && !$hasElearning) {
                $body = "Anda memiliki paket Bootcamp dan Review CV, belum memiliki paket E-learning.";
            } else {
                $body = "Beli paket langganan sekarang, di website kami https://grageacademy.online";
            }


            // Detail pesan yang akan dikirimkan
            $details = [
                'title' => 'Halo, Ini Pesan Dari Kami!',
                'body' => 'Kami ingin menginformasikan sesuatu yang penting untuk Anda. Berikut adalah paket langganan Anda: ' . "\n\n" . $paketList . "\n\n" . $body
            ];

            try {
                // Kirim email ke setiap user
                Mail::to($user->email)->send(new SendUserMessage($details));
            } catch (\Exception $e) {
                // Log error jika email gagal terkirim
                \Log::error('Error sending email to ' . $user->email . ': ' . $e->getMessage());
            }
        }

        return redirect()->route('administrator.manajemenuser.index')->with('success', 'Emails sent to all users successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id):View
    // {
    //     //
    //     $users = User::findOrFail($id);
    //     $akses = DB::table('users')
    //     ->join('users_modul', 'users.id_session', '=', 'users_modul.id_session')
    //     ->join('modul', 'users_modul.id_modul', '=', 'modul.id_modul')
    //     ->where('users.id', $id)
    //     ->orderBy('users_modul.id_umod', 'DESC')
    //     ->get();

    //     $moduls = Manajemenmodul::all(); // Untuk daftar semua modul yang tersedia

    //     return view('administrator.manajemenuser.edit', compact('users', 'akses', 'moduls'));
    // }

    public function edit(string $id): View
    {
        $users = User::findOrFail($id);
        $akses = DB::table('users')
            ->join('users_modul', 'users.id_session', '=', 'users_modul.id_session')
            ->join('modul', 'users_modul.id_modul', '=', 'modul.id_modul')
            ->where('users.id', $id)
            ->orderBy('users_modul.id_umod', 'DESC')
            ->get();

        $moduls = Manajemenmodul::all();
        $akses_user = $akses->pluck('id_modul')->toArray();
        $subscription_packages = Payment::pluck('program_name', 'id');

        // Decode paket langganan dari JSON ke array
        $userPaketLangganan = json_decode($users->paket_langganan, true) ?? [];
        // dd($userPaketLangganan);

        return view('administrator.manajemenuser.edit', compact('users', 'akses', 'moduls', 'akses_user', 'subscription_packages', 'userPaketLangganan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info($request->all());

        // Validasi data yang diterima
        $validated = $request->validate([
            "username" => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png',
            "email" => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6',
            'level' => 'required|string|in:admin,user,pengajar',
            'program_name' => 'array', // Pastikan ini adalah array
        ]);

        // Temukan pengguna berdasarkan ID
        $users = User::findOrFail($id);

        // Simpan paket langganan sebagai JSON
        $users->paket_langganan = json_encode($request->input('program_name', [])); // Simpan data paket langganan

        // Enkripsi password jika diisi
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        } else {
            unset($validated['password']); // Hapus password jika tidak diisi
        }

        // Proses foto jika ada
        $fotoName = $users->foto; // Simpan nama foto lama
        if ($request->hasFile('foto')) {
            $foto = $request->file("foto");
            Log::info('File foto diterima: ', [$foto]);

            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->move("./foto_user/", $fotoName);
        } else {
            Log::info('Tidak ada file foto yang diterima.');
        }

        // Update data pengguna
        $users->update([
            "username" => $validated['username'],
            "nama_lengkap" => $request->nama_lengkap,
            "email" => $validated['email'],
            "level" => $validated['level'],
            "foto" => $fotoName,
            "no_telp" => $request->no_telp,
            "blokir" => 'N',
            "id_session" => md5($validated['username'] . '-' . date('YmdHis')),
            "is_subscribed" => $request->is_subscribed ?? false,
            "paket_langganan" => $users->paket_langganan, // Menggunakan data paket langganan yang sudah di-encode
        ]);

        // Update password jika ada
        if (isset($validated['password'])) {
            $users->update(['password' => $validated['password']]);
        }

        // Proses tambah akses baru
        if ($request->has('modul')) {
            $existingModuls = UserModul::where('id_session', $users->id_session)->pluck('id_modul')->toArray();
            $newModuls = array_diff($request->modul, $existingModuls);

            foreach ($newModuls as $modulId) {
                UserModul::create([
                    'id_session' => $users->id_session,
                    'id_modul' => $modulId
                ]);
            }
        }

        return response()->json([
            'url' => route('administrator.manajemenuser.index'),
            'success' => true,
            'message' => 'Data User Berhasil Diperbarui'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $users = User::findOrFail($id);
        $users->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
