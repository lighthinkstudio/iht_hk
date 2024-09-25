<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    public $table = 'kategori';
    public $timestamps = false;

    protected $fillable = ['nama', 'status'];

    public function datatables()
    {
        $query = DB::table('kategori')->select('kategori.*')
                    ->orderBy('nama', 'ASC')
                    ->get();
        return $query;
    }

    public function aktif()
    {
        $query = DB::table('kategori')->select('kategori.*')
                    ->where('status', 'active')
                    ->orderBy('nama', 'ASC')
                    ->get();
        return $query;
    }
}
