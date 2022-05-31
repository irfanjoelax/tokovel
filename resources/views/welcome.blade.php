@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-4">Hello, Guys!</h1>
    <p class="lead">Mari berbelanja di tokovel, disini kami menyediakan semua kebutuh fashion kalian dengan harga yang lebih murah</p>
    <hr class="my-4">
    <p>Dapatkan update produk-produk terbaru dari kami hanya di {{ config('app.name') }}</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Let's Shop</a>
    </div>
</div>

<div class="container">
    <form action="{{ route('produk.search') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="keyword" placeholder="tuliskan nama produk yang dicari">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Pencarian</button>
            </div>
        </div>
    </form>
</div>

<div class="container mb-4">
    <div class="row">
        <div class="col-md">
            <h1>Produk Terbaru</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($produkTerbaru as $prd)
        <div class="col-md-3">
            <div class="card mt-3">
                <a href="{{ route('produk.detail', ['slug'=>$prd->slug_prd]) }}">
                    <img src="{{ asset('img/produk/'.$prd->gbr_prd) }}" class="card-img-top">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $prd->nm_prd }}</h5>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('keranjang.add', ['produk_id'=>$prd->id_prd]) }}" class="btn btn-sm btn-primary">Masuk Keranjang</a>
                        <small class="text-righ text-primary my-auto">{{ rupiah($prd->hrg_prd ) }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
