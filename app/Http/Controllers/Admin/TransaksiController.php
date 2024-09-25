<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\TransaksiImport;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Transaksi $m_transaksi)
    {
        //
        $limit = $request->limit;
        // LISTING DATA TRANSAKSI
        $transaksi = $m_transaksi->listing($request);
        $transaksi->appends($request->only('search', 'limit'));
        // dd($transaksi);

        $data = [
            'title'     => 'Data Transaksi',
            'transaksi' => $transaksi,
            'limit'     => $limit
        ];
        return view('admin.transaksi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    /**
     * Import a data of the resource.
     */
    public function import(Request $request)
    {
        // VALIDASI
        $validator = Validator::make($request->all(), [
            'import' => 'required|mimes:csv,xls,xlsx'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                    ->withInput()->withErrors($validator)
                    ->with(['warning' => 'Silahkan periksa form input, data gagal di import.']);
        }

        // IMPORT DATA TRANSAKSI
        Excel::import(new TransaksiImport, $request->import);
        
        return redirect()->route('admin.transaksi')
                ->with(['success' => 'Data Transaksi berhasil di import.']);
    }
    
    /**
     * Export a data of the resource.
     */
    public function export(Request $request)
    {
        $namaFile = 'TR-' . time() . '.xlsx';
        // dd($namaFile);
        // EXPORT DATA TRANSAKSI
        return Excel::download(new TransaksiExport, $namaFile);
    }
}
