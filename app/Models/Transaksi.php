<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Transaksi extends Model
{
    use HasFactory;

    public $table = 'transaksi';
    public $timestamps = false;

    protected $fillable = [
        'produk_id',
        'nama_kategori',
        'nama_produk',
        'harga',
        'tanggal_transaksi',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function listing($request)
    {
        $query = DB::table('transaksi')
                    ->when($request->search, function ($query) use ($request) {
                        $query->where('nama_kategori', 'like', "%{$request->search}%")
                                ->orWhere('nama_produk', 'like', "%{$request->search}%");
                    })
                    ->select('transaksi.*')
                    ->orderBy('transaksi.id', 'DESC')
                    ->paginate($request->limit ?? 10);
        return $query;
    }
}
