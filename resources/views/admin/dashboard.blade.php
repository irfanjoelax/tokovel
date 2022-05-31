@extends('adminlte::page')

@section('title', config('app.name').' - Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $TotalKategori }}</h3>
                <p>Kategori</p>
            </div>
            <div class="icon">
                <i class="fa fa-list-alt"></i>
            </div>
            <a href="{{ route('kategori.index') }}" class="small-box-footer">lebih banyak <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $TotalProduk }}</h3>
                <p>Produk</p>
            </div>
            <div class="icon">
                <i class="fa fa-box-open"></i>
            </div>
            <a href="{{ route('produk.index') }}" class="small-box-footer">lebih banyak <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $TotalTransaksi }}</h3>
                <p>Transaksi</p>
            </div>
            <div class="icon">
                <i class="fa fa-file-alt"></i>
            </div>
            <a href="{{ url('admin/transaksi') }}" class="small-box-footer">lebih banyak <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $TotalUser }}</h3>
                <p>User</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <span class="small-box-footer">Pembeli <i class="fas fa-user"></i></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line mr-1"></i>
                    Transaksi: {{ tanggalIndo($tanggalAwal) .' - '. tanggalIndo($tanggalAkhir) }}
                </h3>
            </div>
            <div class="card-body">
                {!! $chartTransaksi->container() !!}
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chartTransaksi->script() !!}
@endsection
