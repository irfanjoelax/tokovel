@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-sm">
            <h1>Detail Produk</h1>
        </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <div class="card">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="{{ asset('img/produk/'.$produk->gbr_prd) }}" class="card-img">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h4 class="card-title">
                  {{ $produk->nm_prd }}
                  <sup><small class="badge badge-pill badge-success">{{ $produk->kategori->nm_kat }}</small></sup>
                </h4>
                <h5>Rp. {{ $produk->hrg_prd }}</h5>
                <div class="row">
                  <div class="col-sm-6">
                    <p>Stok: {{ $produk->stok_prd }}</p>
                  </div>
                  <div class="col-sm-6">
                    <p>Berat: {{ $produk->brt_prd }}</p>
                  </div>
                </div>
                <a href="{{ route('keranjang.add', ['produk_id'=>$produk->id_prd]) }}" class="btn btn-outline-primary">Masuk Keranjang</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm mt-3">
        <div class="card">
          <div class="card-body">
            <h5>Deskripsi:</h5>
            {!! $produk->desk_prd !!}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
