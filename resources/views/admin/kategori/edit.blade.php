@extends('admin.layouts.adminlte.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <a href="{{ route('admin.kategori') }}" class="btn btn-secondary float-right">
                    <i class="fas fa-backward"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update_kategori', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <div class="form-group row">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $kategori->nama }}" placeholder="Nama Kategori">
                                @error('nama')
                                <em class="text-danger"><small>{{ $message }}</small></em>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="status">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                    <option value="active">Active</option>
                                    <option value="inactive" @if($kategori->status == 'inactive') selected @endif>Inactive</option>
                                </select>
                                @error('status')
                                <em class="text-danger"><small>{{ $message }}</small></em>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="float-right">
                                    <a href="{{ route('admin.kategori') }}" class="btn btn-secondary">
                                        <i class="fas fa-undo"></i> Kembali
                                    </a>
                                    <button type="submit" name="submit" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Update
                                    </button>
                                </div>
                            </div>
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