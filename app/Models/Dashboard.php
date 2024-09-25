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
}
