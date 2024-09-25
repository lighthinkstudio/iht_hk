<?php

namespace App\Imports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TransaksiImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [
            //
            'produk_id'         => $row[0],
            'nama_kategori'     => $row[1],
            'nama_produk'       => $row[2],
            'harga'             => $row[3],
            'tanggal_transaksi' => $this->transformDate($row[4]),
            'status'            => $row[5]
        ];
        // dd($data);
        return new Transaksi($data);
    }

    // SET START ROW IMPORT
    public function startRow(): int
    {
        return 3;
    }

    /**
     * Convert Excel date to DateTime instance.
     */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            // Convert Excel date to DateTime object
            return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format($format);
        } catch (\Exception $e) {
            // If the date is already a string, return it as is
            return (new \DateTime($value))->format($format);
        }
    }
}
