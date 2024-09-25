@extends('admin.layouts.adminlte.app')

@section('content')
@include('plugins.datatables_css')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
				<a href="{{ route('admin.export_transaksi') }}" class="btn btn-danger float-right">
					<i class="fas fa-download"></i> Export
				</a>
                <button type="button" class="btn btn-success float-right mr-3" data-toggle="modal" data-target="#formImport">
                    <i class="fas fa-file-excel"></i> Import Data
                </button>
                @include('admin.transaksi.import')
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
										<input type="search" name="search" class="form-control form-control-sm" value="{{ $_GET['search'] ?? '' }}" placeholder="Ketik nama/ sku transaksi..." aria-controls="search">
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
						<div class="float-right">{{ $transaksi->onEachSide(1)->links() }}</div>
					</div>
				</div>
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th class="text-center">Tanggal Transaksi</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($transaksi->total() > 0)
                            @foreach($transaksi as $key => $data)
                            <tr>
                                <td class="text-center">{{ $key + $transaksi->firstItem() }}</td>
                                <td>{{ $data->nama_produk }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>{{ date('d M Y', strtotime($data->tanggal_transaksi)) }}</td>
                                <td class="text-right">{{ number_format($data->harga, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $data->status }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-center">No data available in table</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
					<div class="col-12">
						<div class="float-right">{{ $transaksi->onEachSide(1)->links() }}</div>
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