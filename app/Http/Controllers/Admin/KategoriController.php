<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Kategori $m_kategori)
    {
        // LISTING DATA KATEGORI
        $kategori   = $m_kategori->datatables();
        
        $data = [
            'title'     => 'Data Kategori',
            'kategori'  => $kategori
        ];
        return view('admin.kategori.index', $data);
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
    public function store(StoreKategoriRequest $request)
    {
        // VALIDASI
        $validated = $request->validated;

        Kategori::create([
            'nama'      => $request->nama,
            'status'    => $request->status
        ]);

        return back()->with(['success' => 'Data berhasil di simpan.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $m_kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $m_kategori, $id)
    {
        // DETAIL KATEGORI
        $kategori = $m_kategori->where('id', $id)->first();

        $data = [
            'title'     => 'Edit Data Kategori',
            'kategori'  => $kategori
        ];
        return view('admin.kategori.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $m_kategori, $id)
    {
        // DETAIL KATEGORI
        $kategori = $m_kategori->where('id', $id)->first();

        // VALIDASI
        $validated = $request->validated();

        $data = [
            'nama'      => $request->nama,
            'status'    => $request->status
        ];
        // PROSES UPDATE KATEGORI
        $kategori->update($data);

        return redirect()->route('admin.kategori')
                ->with(['success' => 'Data berhasil di update.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $m_kategori, $id)
    {
        // DETAIL KATEGORI
        $kategori = $m_kategori->where('id', $id)->first();

        // CEK DATA
        if(is_null($kategori))
        {
            return redirect()->route('admin.kategori')
                    ->with(['danger' => 'Data tidak ditemukan.!']);
        }

        // PROSES HAPUS DATA
        $kategori->delete();

        return back()->with(['success' => 'Data berhasil di hapus.']);
    }
}
