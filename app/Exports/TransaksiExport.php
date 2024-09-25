<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class TransaksiExport implements FromQuery, withHeadings
{
    use Exportable;

    public function query()
    {
        return Transaksi::query()->select('produk_id', 'nama_produk', 'nama_kategori', 'harga', 'tanggal_transaksi', 'status');
    }

    public function headings(): array
    {
        return [
            'ID Produk',
            'Nama Produk',
            'Kategori',
            'Harga',
            'Tanggal Transaksi',
            'Status'
        ];
    }
}
