@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-sm">
            <h1>Pencarian Produk</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($produks as $prd)
        <div class="col-md-3">
            <div class="card mt-3">
                <a href="{{ route('produk.detail', ['slug'=>$prd->slug_prd]) }}">
                    <img src="{{ asset('img/produk/'.$prd->gbr_prd) }}" class="card-img-top">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $prd->nm_prd }}</h5>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('keranjang.add', ['produk_id'=>$prd->id_prd]) }}" class="btn btn-sm btn-primary">Masuk Keranjang</a>
                        <small class="text-righ text-primary my-auto">Rp. {{ $prd->hrg_prd }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
