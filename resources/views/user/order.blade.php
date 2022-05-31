@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-header bg-white">
            <h4 class="my-auto d-flex justify-content-between">
              Daftar Order
            </h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID Transaksi</th>
                <th scope="col">Grand Total</th>
                <th scope="col">Status</th>
                <th scope="col" width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaksis as $trx)
              <tr>
                <td>{{ $trx->id_trx }}</td> 
                <td class="text-right">Rp. {{ number_format($trx->ttl_trx) }}</td>  
                <td class="text-center"><span class="badge badge-dark">{{ $trx->stts_trx }}</span></td>
                <td class="text-center">
                  <a href="{{ route('order.detail', ['id'=>$trx->id_trx]) }}" class="btn btn-sm btn-success">Detail</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
