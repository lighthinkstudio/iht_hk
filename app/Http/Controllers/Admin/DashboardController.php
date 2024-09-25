<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    //
    public function index(Dashboard $m_dashboard)
    {
        $totalTransaksi     = $m_dashboard->totalTransaksi();
        $transaksiSukses    = $m_dashboard->transaksiSukses();
        $transaksiGagal     = $m_dashboard->transaksiGagal();
        $transaksiMenunggu  = $m_dashboard->transaksiMenunggu();
        // dd($transaksiSukses);

        $data = [
            'title'             => 'Halaman Dashboard',
            'totalTransaksi'    => $totalTransaksi,
            'transaksiSukses'   => $transaksiSukses,
            'transaksiGagal'    => $transaksiGagal,
            'transaksiMenunggu' => $transaksiMenunggu
        ];
        return view('admin.dashboard.index', $data);
    }
}
