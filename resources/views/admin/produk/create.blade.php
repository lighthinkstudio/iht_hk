<div class="modal fade" id="formCreate">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.simpan_produk') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku') }}" placeholder="SKU Produk">
                            @error('sku')
                            <em class="text-danger"><small>{{ $message }}</small></em>
                            @enderror
                        </div>
                        
                        <div class="col-md-8">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama Produk">
                            @error('nama')
                            <em class="text-danger"><small>{{ $message }}</small></em>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="nama">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Deskripsi produk">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <em class="text-danger"><small>{{ $message }}</small></em>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="harga">Harga</label>
                            <input type="number" min="0" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Nama Produk">
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
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
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
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('status')
                            <em class="text-danger"><small>{{ $message }}</small></em>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Close
                    </button>
                    <button type="reset" class="btn btn-info">
                        <i class="fas fa-sync-alt"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->