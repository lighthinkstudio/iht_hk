@extends('admin.layouts.adminlte.app')

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
        <h3>{{ $totalTransaksi }}</h3>

        <p>Total Transaksi</p>
        </div>
        <div class="icon">
        <i class="fas fa-cash-register"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
        <h3>{{ $transaksiSukses }}</h3>

        <p>Transaksi Sukses</p>
        </div>
        <div class="icon">
        <i class="fas fa-check"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner text-white">
        <h3>{{ $transaksiMenunggu }}</h3>

        <p>Transaksi Menunggu</p>
        </div>
        <div class="icon">
        <i class="fas fa-hourglass-half"></i>
        </div>
        <a href="#" class="small-box-footer" style="color: white !important">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
        <h3>{{ $transaksiGagal }}</h3>

        <p>Transaksi Gagal</p>
        </div>
        <div class="icon">
        <i class="fas fa-ban"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
@include('plugins.amcharts_js')
@include('admin.dashboard.line_chart')
@include('admin.dashboard.pie_chart')

@endsection