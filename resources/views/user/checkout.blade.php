@extends('layouts/app')

@section('content')
<div class="container mt-4 mb-4">
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Keranjang</span>
        <span class="badge badge-primary badge-pill">{{ $carts->count() }} </span>
      </h4>
      <ul class="list-group mb-3">
        @foreach ($carts as $cart)
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">{{ $cart->nmprd_krj }}</h6>
            <small class="text-muted">x{{ $cart->jml_krj }}</small>
          </div>
          <span class="text-muted">Rp.{{ number_format($cart->ttl_krj) }}</span>
        </li>
        @endforeach
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (IDR)</span>
          <strong>Rp. {{ number_format($carts->sum('ttl_krj'))}}</strong>
        </li>
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Checkout</h4>
      <form class="needs-validation" method="POST" action="{{ url('/user/checkout') }}">
        @csrf
        <div class="mb-3">
          <label for="nama">Nama Penerima</label>
          <input type="nama" class="form-control" name="nama" value="{{ Auth::user()->name }}">
          <div class="invalid-feedback">
            Please enter a valid nama address for shipping updates.
          </div>
        </div>
        <div class="mb-3">
          <label for="telepon">Telepon</label>
          <input type="text" class="form-control" name="telepon" placeholder="+62 8">
          <div class="invalid-feedback">
            Please enter a valid telepon address for shipping updates.
          </div>
        </div>
        <div class="mb-3">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" name="alamat" placeholder="Jalan ...">
          <div class="invalid-feedback">
            Please enter your shipping alamat.
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Lanjutkan pesanan</button>
      </form>
    </div>
  </div>

@endsection