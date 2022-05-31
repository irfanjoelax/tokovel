@extends('adminlte::page')

@section('title', config('app.name').' - Transaksi')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h4 class="my-auto d-flex justify-content-between">
          Detail Transaksi
          <a href="{{ route('transaksi.update', ['id'=>$transaksi->id_trx]) }}" class="btn btn-sm btn-primary text-capitalize">{{ $transaksi->stts_trx}}</a>
        </h4>
    </div>
    <div class="card-body">
      <div class="row">
        <label class="col-sm-2">ID Transaksi</label>
        <div class="col-sm-10">
          {{ $transaksi->id_trx}}
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2">Tanggal</label>
        <div class="col-sm-10">
          {{ tanggalIndo(substr($transaksi->created_at,0,10)) }}
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2">Nama</label>
        <div class="col-sm-10">
          {{ $transaksi->user->name }}
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2">Email</label>
        <div class="col-sm-10">
          {{ $transaksi->user->email }}
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2">Telepon</label>
        <div class="col-sm-10">
          {{ $transaksi->telp_trx}}
        </div>
      </div>
      <div class="row">
        <label class="col-sm-2">Alamat</label>
        <div class="col-sm-10">
          {{ $transaksi->almt_trx}}
        </div>
      </div>
      
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" width="5%" class="text-center">#</th>
            <th scope="col" width="15%">Gambar</th>
            <th scope="col" width="45%">Nama Produk</th>
            <th scope="col" width="15%">Harga</th>
            <th scope="col" width="5%">Jumlah</th>
            <th scope="col" width="15%">Total</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1 @endphp
          @foreach ($transaksi->details as $trx)
          <tr>
            <td class="text-center">{{ $no++ }}</td>
            <td>
              <img src="{{ asset('img/produk/'.$trx->produk->gbr_prd) }}" alt="..." class="img-thumbnail">
            </td> 
            <td>{{ $trx->produk->nm_prd }}</td> 
            <td class="text-right">Rp. {{ number_format($trx->produk->hrg_prd) }}</td> 
            <td class="text-center">x{{ $trx->jml_det }}</td> 
            <td class="text-right">Rp. {{ number_format($trx->produk->hrg_prd * $trx->jml_det) }}</td>  
          </tr>
          @endforeach
          <tr>
            <td colspan="4" class="text-right"><h5>Grand Total</h5></td>
            <td colspan="2" class="text-right">
              <h5>Rp. {{ number_format($transaksi->ttl_trx) }}</h5>
            </td>
          </tr>
          <tr>
            <td colspan="6" class="text-right">
              <h5>{{ terbilang($transaksi->ttl_trx) }}</h5>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</div>
@stop
