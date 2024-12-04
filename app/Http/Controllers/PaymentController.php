<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Metode;
use App\Models\Payment;
use App\Models\Sertifikat;
use App\Models\Bootcamp;
use App\Models\Programcv;
use App\Models\Bannerslider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Berlangganan; // Pastikan ini benar

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $program_name = $request->program_name;

        $query = Payment::query();
        // dd($query);

        if (!empty($search)) {
            $query->where('program_name', 'like', "%$search%");
        }

        if (!empty($program_name)) {
            $query->where('program_name', $program_name);
        }

        $payments = $query->with('user')->paginate(10);


        $program_names = Payment::select('program_name')
            ->groupBy('program_name')
            ->get();
        // dd($bootcamp);

        return view('administrator.payment.index', compact('payments', 'program_names'));
    }

    public function show_user()
    {
        $user = Auth::user();

        // Debug output untuk memastikan data diambil dengan benar
        $payments = Payment::where(function ($query) use ($user) {
            $query->where('id_user', $user->id);
        })->get();
        
        

        // $elearningPayments = $payments->filter(function ($payment) {
        //     return stripos($payment->program_name, 'Paket Video E-Learning') !== false;
        // });
        
        $elearningPayments = DB::table('payments')
            ->join('berlangganan', 'payments.berlangganan_id', '=', 'berlangganan.id_berlangganan')
            ->where('id_user', $user->id)
            ->where('payments.program_name', 'like', '%Paket Video E-Learning%')
            ->select(
                'payments.id',
                'payments.id_invoice',
                'payments.id_user',
                'payments.program_name',
                'payments.payment_datetime',
                'payments.total',
                'payments.status',
                'payments.payment_method',
                'berlangganan.masa_berlangganan as nama_berlangganan',
                // 'berlangganan.durasi',
                // 'berlangganan.harga'
            )
            ->get();
            
        
        // $reviewPayments = $payments->filter(function ($payment) {
        //     return stripos($payment->program_name, 'Paket Review') !== false;
        // });
        
        $reviewPayments = DB::table('payments')
            ->join('program_cv', 'payments.berlangganan_id', '=', 'program_cv.id_programcv')
            ->where('id_user', $user->id)
            ->where('payments.program_name', 'like', '%Paket Review%')
            ->select(
                'payments.id',
                'payments.id_invoice',
                'payments.id_user',
                'payments.program_name',
                'payments.payment_datetime',
                'payments.total',
                'payments.status',
                'payments.payment_method',
                'program_cv.nama_programcv as nama_berlangganan',
                // 'program_cv.durasi',
                // 'program_cv.harga'
            )
            ->get();


        // $bootcampPayments = $payments->filter(function ($payment) {
        //     return stripos($payment->program_name, 'Paket Bootcamp') !== false;
        // });

        $bootcampPayments = DB::table('payments')
            ->join('bootcamps', 'payments.berlangganan_id', '=', 'bootcamps.id_bootcamp')
            ->where('id_user', $user->id)
            ->where('payments.program_name', 'like', '%Paket Bootcamp%')
            ->select(
                'payments.id',
                'payments.id_invoice',
                'payments.id_user',
                'payments.program_name',
                'payments.payment_datetime',
                'payments.total',
                'payments.status',
                'payments.payment_method',
                'bootcamps.judul_bootcamp as nama_berlangganan',
                // 'bootcamp.durasi',
                // 'bootcamp.harga'
            )
            ->get();

        // dd($bootcampPayments); // Pastikan data diambil dengan benar
        return view('myskill.pages.profile.my-purchase', [
            'elearningPayments' => $elearningPayments,
            'reviewPayments' => $reviewPayments,
            'bootcampPayments' => $bootcampPayments,

        ]);
    }
    
      public function show_users()
    {
        $user = Auth::user();

        // Debug output untuk memastikan data diambil dengan benar
        $payments = Payment::where(function ($query) use ($user) {
            $query->where('id_user', $user->id);
        })->get();

        // dd($payments); // Pastikan data diambil dengan benar

        // $elearningPayments = $payments->filter(function ($payment) {
        //     return stripos($payment->program_name, 'Paket Video E-Learning') !== false;
        // });

        // $reviewPayments = $payments->filter(function ($payment) {
        //     return stripos($payment->program_name, 'Paket Review') !== false;
        // });

        // $bootcampPayments = $payments->filter(function ($payment) {
        //     return stripos($payment->program_name, 'Paket Bootcamp') !== false;
        // });
        
        
        
        $elearningPayments = DB::table('payments')
            ->join('berlangganan', 'payments.berlangganan_id', '=', 'berlangganan.id_berlangganan')
            ->where('id_user', $user->id)
            ->where('payments.program_name', 'like', '%Paket Video E-Learning%')
            ->select(
                'payments.id',
                'payments.id_invoice',
                'payments.id_user',
                'payments.program_name',
                'payments.payment_datetime',
                'payments.total',
                'payments.status',
                'payments.payment_method',
                'berlangganan.masa_berlangganan as nama_berlangganan',
                // 'berlangganan.durasi',
                // 'berlangganan.harga'
            )
            ->get();
            
        // dd($elearningPayments);
            
        $reviewPayments = DB::table('payments')
            ->join('program_cv', 'payments.berlangganan_id', '=', 'program_cv.id_programcv')
            ->where('id_user', $user->id)
            ->where('payments.program_name', 'like', '%Paket Review%')
            ->select(
                'payments.id',
                'payments.id_invoice',
                'payments.id_user',
                'payments.program_name',
                'payments.payment_datetime',
                'payments.total',
                'payments.status',
                'payments.payment_method',
                'program_cv.nama_programcv as nama_berlangganan',
                // 'program_cv.durasi',
                // 'program_cv.harga'
            )
            ->get();

        $bootcampPayments = DB::table('payments')
            ->join('bootcamps', 'payments.berlangganan_id', '=', 'bootcamps.id_bootcamp')
            ->where('id_user', $user->id)
            ->where('payments.program_name', 'like', '%Paket Bootcamp%')
            ->select(
                'payments.id',
                'payments.id_invoice',
                'payments.id_user',
                'payments.program_name',
                'payments.payment_datetime',
                'payments.total',
                'payments.status',
                'payments.payment_method',
                'bootcamps.judul_bootcamp as nama_berlangganan',
                // 'bootcamp.durasi',
                // 'bootcamp.harga'
            )
            ->get();
        
        return view('myskill.pages.profile.my-transaction', [
            'elearningPayments' => $elearningPayments,
            'reviewPayments' => $reviewPayments,
            'bootcampPayments' => $bootcampPayments,
        ]);
    }

    public function learning($id)
    {
        $berlanggananss = Berlangganan::all();
        $metod = Metode::all();
        $langganan = "E-Learning";
        $banner = Bannerslider::where('judul', $langganan)->first();


        // Menyaring data berlangganan berdasarkan $id
        $berlanggananss = $berlanggananss->where('id_berlangganan', $id)->first();
        $berlanggananss->id_benefits = json_decode($berlanggananss->id_benefits); // Decode JSON
        
        $paymentall = Payment::where('status', "completed")->get();

        // Logika untuk menampilkan halaman pembayaran
        // Anda bisa mengambil data berlangganan berdasarkan $id di sini
        return view('myskill.pages.e-learning.payment', compact('id', 'berlanggananss', 'banner', 'metod', 'langganan', 'paymentall'));
    }
    
    public function activity()
    {
        $sertifikat = Sertifikat::where('id_user', Auth::user()->id)
                                ->with('bootcamp') // Eager load the bootcamp relationship
                                ->get();
        return view('myskill.pages.profile.my-activity', compact('sertifikat'));
    }


    public function bootcamp($id)
    {
        $bootcamps = Bootcamp::all();
        $metod = Metode::all();
        $langganan = "Bootcamp";
        $banner = Bannerslider::where('judul', $langganan)->first();


        // Menyaring data berlangganan berdasarkan $id
        $bootcamps = $bootcamps->where('id_bootcamp', $id)->first();
        $bootcamps->id_benefits = json_decode($bootcamps->id_benefits); // Decode JSON
        $paymentall = Payment::where('status', "completed")->get();

        // Logika untuk menampilkan halaman pembayaran
        // Anda bisa mengambil data berlangganan berdasarkan $id di sini
        return view('myskill.pages.e-learning.payment', compact('id', 'bootcamps', 'banner', 'metod', 'langganan', 'paymentall'));
    }

    public function review($id)
    {
        $metod = Metode::all();
        $programs = Programcv::all();
        $langganan = "Review CV";
        $banner = Bannerslider::where('judul', $langganan)->first();
        



        $programs = $programs->where('id_programcv', $id)->first();
        $programs->id_benefits = json_decode($programs->id_benefits); // Decode JSON
        $paymentall = Payment::where('status', "completed")->get();
        
        // Logika untuk menampilkan halaman pembayaran
        // Anda bisa mengambil data berlangganan berdasarkan $id di sini
        return view('myskill.pages.e-learning.payment', compact('id', 'programs', 'banner', 'metod', 'langganan', 'paymentall'));
    }

    public function approve($id)
    {
        // Temukan pembayaran berdasarkan ID
        $payment = Payment::findOrFail($id);

        // Perbarui status pembayaran
        $payment->status = 'completed';
        $payment->save();

        // Temukan pengguna yang terkait dengan pembayaran
        $user = User::where('username', $payment->username)->first(); // atau sesuai dengan cara Anda menyimpan referensi pengguna

        // Perbarui program_name pengguna jika ada
        if ($user) {
            $current_packages = json_decode($user->paket_langganan, true);
            $current_packages[] = $payment->program_name; // Tambah paket baru ke array
            $user->paket_langganan = json_encode($current_packages);
            $user->save();
        }

        return redirect()->back()->with('success', 'Pembayaran berhasil disetujui dan program pengguna diperbarui!');
    }


    public function cancel($id)
    {
        $payment = Payment::findOrFail($id);
        
          if ($payment->gambar) {
            $path = "./bukti_payment/" . $payment->gambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $payment->status = 'canceled';
        $payment->delete();

        return redirect()->back()->with('success', 'Pembayaran berhasil dibatalkan dan dihapus!');
    }



    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'berlangganan_id' => 'required|string',
                'id_invoice' => 'required|string',
                'gambar' => 'required|mimes:jpeg,png,jpg', // Validasi gambar
                'payment_method' => 'required',
                'total' => 'required',
                'program_name' => 'required',
                'id_user' => 'required'
            ]);

            // Inisialisasi variabel fileName
            $fileName = null;

            // Handle upload gambar
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move("./bukti_payment", $fileName); // Simpan di public/bukti_payment
            }

            // Bersihkan format angka 'total' (hapus titik pemisah ribuan)
            $cleanedTotal = str_replace('.', '', $request->input('total'));

            // Simpan data pembayaran
            Payment::create([
                'berlangganan_id' => $request->input('berlangganan_id'),
                'id_invoice' => $request->input('id_invoice'),
                'program_name' => $request->input('program_name'),
                'id_user' => $request->input('id_user'),
                'payment_method' => $request->input('payment_method'),
                'gambar' => $fileName, // Nama file gambar
                'total' => $cleanedTotal, // Simpan total tanpa pemisah ribuan
                'payment_datetime' => now(), // Simpan waktu saat ini
                'status' => 'pending', // Status awal pembayaran
            ]);

            // Mengirim pesan sukses ke view
            return redirect()->route('Purchased')->with('success', 'Pembayaran berhasil Diupload!');
        } catch (\Exception $e) {
            // Mengirim pesan error ke view
            // dd($request);
            return redirect()->back()->with('error', 'Pembayaran gagal diupload: ' . $e->getMessage());
        }
    }
    // Tambahkan ini jika belum ada

    public function completePayment($id)
    {
        // Ambil data payment berdasarkan ID
        $payment = Payment::findOrFail($id);

        // Cari user yang cocok dengan username dan email dari tabel payment
        $user = User::where('id', $payment->id_user) 
            ->first();

        if ($user) {
            // Ambil semua payments terkait dengan user
            $payments = Payment::where('id_user', $user->id)
                ->where('status', 'completed') // Hanya ambil yang sudah completed
                ->pluck('program_name') // Mengambil array program_name
                ->toArray(); // Ubah menjadi array

            // Debug untuk melihat data
            // dd($payments); // Cek apakah data program_name ada atau kosong

            // Pastikan array tidak kosong sebelum menyimpannya
            if (!empty($payments)) {
                // Update kolom paket_langganan di tabel user
                $user->paket_langganan = json_encode($payments); // Simpan array program_name sebagai JSON
                $user->is_subscribed = 1; // Menandai user sebagai berlangganan
                $user->save();

                // Ubah status payment menjadi completed
                $payment->status = 'completed';
                $payment->save();

                return redirect()->back()->with('success', 'Payment completed and subscription updated successfully.');
            } else {
                return redirect()->back()->with('error', 'No valid programs found for this user.');
            }
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
