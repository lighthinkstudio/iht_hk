<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Produk $m_produk, Kategori $m_kategori)
    {
        $limit  = $request->limit;
        // LISTING DATA PRODUK
        $produk = $m_produk->listing($request);
        $produk->appends($request->only('search', 'limit'));

        // KATEGORI STATUS AKTIF
        $kategori = $m_kategori->aktif();
        // dd($produk);
        
        $data = [
            'title'     => 'Data Produk',
            'produk'    => $produk,
            'kategori'  => $kategori,
            'limit'     => $limit
        ];
        return view('admin.produk.index', $data);
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
    public function store(StoreProdukRequest $request)
    {
        // VALIDASI
        $validated = $request->validated;

        // UPLOAD GAMBAR
        $namaFile = '';
        if($request->hasFile('gambar'))
        {
            $fileUpload = $request->file('gambar')->store('assets/uploads/images', 'public');
            $namaFile   = basename($fileUpload);
        }

        Produk::create([
            'kategori_id'   => $request->kategori,
            'sku'           => $request->sku,
            'nama'          => $request->nama,
            'deskripsi'     => $request->deskripsi,
            'harga'         => $request->harga,
            'gambar'        => $namaFile,
            'status'        => $request->status,
            'created_at'    => now()
        ]);

        return back()->with(['success' => 'Data berhasil di simpan.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $m_produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $m_produk, Kategori $m_kategori, $id)
    {
        // DETAIL PRODUK
        $produk = $m_produk->where('id', $id)->first();

        // KATEGORI STATUS AKTIF
        $kategori = $m_kategori->aktif();

        $data = [
            'title'     => 'Edit Data Produk',
            'produk'    => $produk,
            'kategori'  => $kategori
        ];
        return view('admin.produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $m_produk, $id)
    {
        // DETAIL PRODUK
        $produk = $m_produk->where('id', $id)->first();

        // VALIDASI
        $validated = $request->validated();

        // UPLOAD GAMBAR
        $namaFile = $produk->gambar;
        if($request->hasFile('gambar'))
        {
            // CEK GAMBAR LAMA
            $fileLama   = './storage/assets/uploads/images/' . $produk->gambar;
            if(!empty($namaFile) && file_exists($fileLama))
            {
                // HAPUS GAMBAR LAMA
                unlink($fileLama);
            }

            $fileUpload = $request->file('gambar')->store('assets/uploads/images', 'public');
            $namaFile   = basename($fileUpload);
        }

        $data = [
            'kategori_id'   => $request->kategori,
            'sku'           => $request->sku,
            'nama'          => $request->nama,
            'deskripsi'     => $request->deskripsi,
            'harga'         => $request->harga,
            'gambar'        => $namaFile,
            'status'        => $request->status,
            'updated_at'    => now()
        ];
        // PROSES UPDATE PRODUK
        $produk->update($data);

        return redirect()->route('admin.produk')
                ->with(['success' => 'Data berhasil di update.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $m_produk, $id)
    {
        // DETAIL PRODUK
        $produk = $m_produk->where('id', $id)->first();

        // CEK DATA
        if(is_null($produk))
        {
            return redirect()->route('admin.produk')
                    ->with(['danger' => 'Data tidak ditemukan.!']);
        }

        // CEK GAMBAR LAMA
        $fileLama   = './storage/assets/uploads/images/' . $produk->gambar;
        if(!empty($produk->gambar) && file_exists($fileLama))
        {
            // HAPUS GAMBAR LAMA
            unlink($fileLama);
        }

        // PROSES HAPUS DATA
        $produk->delete();

        return back()->with(['success' => 'Data berhasil di hapus.']);
    }
}
