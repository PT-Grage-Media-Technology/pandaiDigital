<?php

namespace App\Http\Controllers;

use App\Models\Grafik;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    // Method to handle AJAX request
    public function fetchGrafikData()
    {
        $data = Grafik::selectRaw('DATE(tanggal) as tanggal, COUNT(*) as jumlah_kunjungan')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'desc') // Order by date in descending order
            ->get();

        $labels = [];
        $jumlahKunjungan = [];

        foreach ($data as $stat) {
            $labels[] = date("d_M", strtotime($stat->tanggal)); // Format: 03_Sep
            $jumlahKunjungan[] = $stat->jumlah_kunjungan;
        }

        // Return data as JSON
        return response()->json(['labels' => $labels, 'jumlahKunjungan' => $jumlahKunjungan]);
    }

}
