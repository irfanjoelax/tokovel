@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-sm">
            <h1>Keranjang</h1>
        </div>
    </div>
    <div class="row">
      <div class="col-sm">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" width="5%" class="text-center">#</th>
              <th scope="col" width="15%">Gambar</th>
              <th scope="col" width="55%">Produk</th>
              <th scope="col" width="5%">Jumlah</th>
              <th scope="col" width="10%">Total</th>
              <th scope="col" width="10%"></th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; @endphp
            
            @foreach ($carts as $cart)
            <tr>
              <th scope="row" class="text-center">{{ $no++ }}</th>
              <td><img class="img-thumbnail" src="{{ asset('img/produk/'.$cart->gbrprd_krj) }}" alt=""></td>
              <td>{{ $cart->nmprd_krj }}</td>
              <td class="text-center">x{{ $cart->jml_krj }}</td>
              <td class="text-right">Rp. {{ number_format($cart->ttl_krj) }}</td>
              <td class="text-center">
                <a href="{{ route('keranjang.delete', ['id'=>$cart->id]) }}" class="btn btn-danger btn-sm">hapus</a>
              </td>
            </tr>
            @endforeach
            <tr class="text-right">
              <td colspan="4">Grand Total</td>
              <td colspan="2">Rp. {{ number_format($carts->sum('ttl_krj')) }}</td>
            </tr>
          </tbody>
        </table>
        <a href="{{ url('/user/checkout') }}" class="btn btn-primary btn-lg">Checkout</a>
      </div>
    </div>
</div>
@endsection