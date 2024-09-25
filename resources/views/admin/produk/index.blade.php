@extends('admin.layouts.adminlte.app')

@section('content')
@include('plugins.datatables_css')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formCreate">
                    <i class="fas fa-plus"></i> Tambah
                </button>
                @include('admin.produk.create')
            </div>
            <div class="card-body">
                <form action="{{ url()->current() }}">
					<div class="row mb-2">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-check-label mr-1" for="limit">
									Filter 
								</label>
								<select name="limit" class="custom-select custom-select-sm form-control form-control-sm col-2" aria-controls="limit">
									<option value="10" @if($limit == 10)selected @endif>10</option>
									<option value="25" @if($limit == 25)selected @endif>25</option>
									<option value="50" @if($limit == 50)selected @endif>50</option>
									<option value="100" @if($limit == 100)selected @endif>100</option>
								</select>
								<button type="submit" class="btn btn-sm btn-info">
									<i class="fas fa-filter"></i> Show
								</button>
								<label class="form-check-label ml-1" for="limit">
									entries 
								</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="float-right">
								<div class="form-inline">
									<label class="form-check-label mr-1" for="search">
										Search: 
									</label>
									<div class="input-group">
										<input type="search" name="search" class="form-control form-control-sm" value="{{ $_GET['search'] ?? '' }}" placeholder="Ketik nama/ sku produk..." aria-controls="search">
										<span class="input-group-append">
											<button type="submit" class="btn btn-sm btn-info">
												<i class="fas fa-search"></i> Cari
											</button>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-12">
						<div class="float-right">{{ $produk->onEachSide(1)->links() }}</div>
					</div>
				</div>
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($produk->total() > 0)
                            @foreach($produk as $no => $data)
                            <tr>
                                <td class="text-center">{{ $no + 1 }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img width="90" class="img-thumbnail" src="{{ asset('storage/assets/uploads/images/' . $data->gambar) }}" alt="Gambar">
                                        </div>
                                        <div class="col-md-9">
                                            {{ $data->nama }}<br>
                                            <small>SKU:</small> <small class="text-primary">{{ $data->sku }}</small><br>
                                            <small>Harga: Rp {{ number_format($data->harga, 0, ',', '.') }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>{{ $data->status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.edit_produk', $data->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete-{{ $data->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @include('admin.produk.delete')
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">No data available in table</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
					<div class="col-12">
						<div class="float-right">{{ $produk->onEachSide(1)->links() }}</div>
					</div>
				</div>
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->
 @include('plugins.datatables_js')
@endsection