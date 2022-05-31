@extends('adminlte::page')

@section('title', config('app.name').' - Kategori')

@section('content')
<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h4 class="my-auto d-flex justify-content-between">
        Ubah Data Kategori
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.update', ['kategori'=>$kategori->id_kat]) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{ $kategori->nm_kat }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-2">
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
