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
                @include('admin.kategori.create')
            </div>
            <div class="card-body">
                <table id="datatables" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $no => $data)
                        <tr>
                            <td class="text-center">{{ $no + 1 }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->status }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.edit_kategori', $data->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete-{{ $data->id }}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        @include('admin.kategori.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->
 @include('plugins.datatables_js')
@endsection