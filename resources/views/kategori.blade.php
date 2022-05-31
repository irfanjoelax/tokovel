@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-sm">
            <h1>Daftar Kategori</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($kategoris as $kat)
        <div class="col-sm-4">
            <div class="card mt-3 shadow rounded-lg">
                <div class="row no-gutters">
                  <div class="col-sm-4 my-auto text-center">
                    <h1 class="my-auto">{{ $kat->produks->count() }}</h1>
                  </div>
                  <div class="col-sm-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $kat->nm_kat}}</h5>
                      <a href="{{ route('kategori.detail', ['slug'=>$kat->slug_kat]) }}" class="btn btn-sm btn-primary">Lihat Kategori</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
