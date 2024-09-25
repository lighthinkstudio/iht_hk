<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Produk extends Model
{
    use HasFactory;

    public $table = 'produk';
    public $timestamps = false;

    protected $fillable = [
        'kategori_id',
        'sku',
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function listing($request)
    {
        $query = DB::table('produk')
                    ->when($request->search, function ($query) use ($request) {
                        $query->where('produk.nama', 'like', "%{$request->search}%")
                                ->orWhere('produk.sku', 'like', "%{$request->search}%");
                    })
                    ->select('produk.*', 'kategori.nama as nama_kategori')
                    ->leftJoin('kategori', 'kategori.id', 'produk.kategori_id')
                    ->orderBy('produk.nama', 'ASC')
                    ->paginate($request->limit ?? 10);
        return $query;
    }
}
