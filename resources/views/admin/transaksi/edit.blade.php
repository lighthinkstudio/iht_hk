@extends('admin.layouts.adminlte.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <a href="{{ route('admin.produk') }}" class="btn btn-secondary float-right">
                    <i class="fas fa-backward"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update_produk', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-4 offset-4 mb-5">
                            <img width="100%" class="img-thumbnail" src="{{ asset('storage/assets/uploads/images/' . $produk->gambar) }}" alt="Gambar">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="sku">SKU</label>
                                    <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ $produk->sku }}" placeholder="SKU Produk">
                                    @error('sku')
                                    <em class="text-danger"><small>{{ $message }}</small></em>
                                    @enderror
                                </div>
                                
                                <div class="col-md-8">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $produk->nama }}" placeholder="Nama Produk">
                                    @error('nama')
                                    <em class="text-danger"><small>{{ $message }}</small></em>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="nama">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Deskripsi produk">{{ $produk->deskripsi }}</textarea>
                                    @error('deskripsi')
                                    <em class="text-danger"><small>{{ $message }}</small></em>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="harga">Harga</label>
                                    <input type="number" min="0" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $produk->harga }}" placeholder="Nama Produk">
                                    @error('harga')
                                    <em class="text-danger"><small>{{ $message }}</small></em>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori">
                                        <option value="">Pilih kategori</option>
                                        @foreach($kategori as $data)
                                        <option value="{{ $data->id }}" @if($data->id == $produk->kategori_id) selected @endif>{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                    <em class="text-danger"><small>{{ $message }}</small></em>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="gambar">Gambar/ Foto</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                                    @error('gambar')
                                    <em class="text-danger"><small>{{ $message }}</small></em>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                        <option value="active">Active</option>
                                        <option value="inactive" @if($produk->status == 'inactive') selected @endif>Inactive</option>
                                    </select>
                                    @error('status')
                                    <em class="text-danger"><small>{{ $message }}</small></em>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="{{ route('admin.produk') }}" class="btn btn-secondary">
                                <i class="fas fa-undo"></i> Kembali
                            </a>
                            <button type="submit" name="submit" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->
@endsection