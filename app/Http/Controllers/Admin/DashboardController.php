<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index(Dashboard $m_dashboard)
    {
        $totalTransaksi     = $m_dashboard->totalTransaksi();
        $transaksiSukses    = $m_dashboard->transaksiSukses();
        $transaksiGagal     = $m_dashboard->transaksiGagal();
        $transaksiMenunggu  = $m_dashboard->transaksiMenunggu();

        // TRANSAKSI PER BULAN
        $transaksiPerBulan = $m_dashboard->transaksiPerBulan();

        $allMonths = collect(range(1, 12))->map(function ($month) {
            return [
                'id'    => $month,
                'bulan' => Carbon::create()->month($month)->format('F'),  // Nama bulan
                'total' => 0  // Default transaksi 0
            ];
        });

        // Gabungkan data transaksi dengan semua bulan
        $lineChart = $allMonths->map(function ($monthData) use ($transaksiPerBulan) {
            // Cari data transaksi untuk bulan yang bersangkutan
            $found = $transaksiPerBulan->firstWhere('month', $monthData['id']);
            
            // Jika data ditemukan, ganti total transaksi
            if ($found) {
                $monthData['total'] = $found->total_transaksi;
            }
            
            return $monthData;
        });

        // TRANSAKSI PER PRODUK
        $pieChart = $m_dashboard->transaksiPerProduk();
        // dd(json_encode($pieChart));

        $data = [
            'title'                 => 'Halaman Dashboard',
            'totalTransaksi'        => $totalTransaksi,
            'transaksiSukses'       => $transaksiSukses,
            'transaksiGagal'        => $transaksiGagal,
            'transaksiMenunggu'     => $transaksiMenunggu,
            'lineChart'             => json_encode($lineChart),
            'pieChart'              => json_encode($pieChart)
        ];
        return view('admin.dashboard.index', $data);
    }
}
