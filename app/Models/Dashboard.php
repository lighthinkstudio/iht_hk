<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Dashboard extends Model
{
    use HasFactory;

    public function totalTransaksi()
    {
        $query = DB::table('transaksi')
                    ->select('transaksi.*')
                    ->orderBy('id', 'DESC')
                    ->count();
        return $query;
    }

    public function transaksiSukses()
    {
        $query = DB::table('transaksi')
                    ->select('transaksi.*')
                    ->where('status', 'sukses')
                    ->orderBy('id', 'DESC')
                    ->count();
        return $query;
    }

    public function transaksiGagal()
    {
        $query = DB::table('transaksi')
                    ->select('transaksi.*')
                    ->where('status', 'gagal')
                    ->orderBy('id', 'DESC')
                    ->count();
        return $query;
    }

    public function transaksiMenunggu()
    {
        $query = DB::table('transaksi')
                    ->select('transaksi.*')
                    ->where('status', 'menunggu')
                    ->orderBy('id', 'DESC')
                    ->count();
        return $query;
    }

    public function transaksiPerBulan()
    {
        $query = DB::table('transaksi')
                    ->select(
                        DB::raw('MONTH(tanggal_transaksi) as month'),
                        DB::raw('COUNT(*) as total_transaksi')
                    )
                    ->groupBy(DB::raw('MONTH(tanggal_transaksi)'))
                    ->get();
        return $query;
    }

    public function transaksiPerProduk()
    {
        $totalTransaksi = DB::table('transaksi')->count();

        $query = DB::table('transaksi')
            ->select(
                'nama_produk',
                DB::raw('COUNT(*) as total_transaksi'),
                DB::raw('ROUND((COUNT(*) / '. $totalTransaksi .') * 100, 2) as persen_transaksi')
            )
            ->groupBy('nama_produk')
            ->get();

        return $query;
    }
}
