<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Kategori;
use DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TRUNCATE TABLE
        Schema::disableForeignKeyConstraints();
        DB::table('kategori')->truncate();
        Schema::enableForeignKeyConstraints();

        // KOLEKSI DATA KATEGORI
        $kategori = [
            [
                'nama'      => 'Komputer',
                'status'    => 'active'
            ],
            [
                'nama'      => 'Handphone',
                'status'    => 'active'
            ],
            [
                'nama'      => 'Tablet',
                'status'    => 'active'
            ],
        ];

        // LOOPING DATA KATEGORI
        foreach($kategori as $data)
        {
            // PROSES SIMPAN DATA KATEGORI
            Kategori::updateOrCreate($data);
        }
    }
}
