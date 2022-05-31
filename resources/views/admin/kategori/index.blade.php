@extends('adminlte::page')

@section('title', config('app.name').' - Kategori')

@section('content')
<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h4 class="my-auto d-flex justify-content-between">
          Daftar Data Kategori
          <a href="{{ route('kategori.create') }}" class="btn btn-primary">Create Data</a>
        </h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="text-center" width="5%">#</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Slug</th>
            <th scope="col" width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1 @endphp
          @foreach ($kategoris as $ktg)
          <tr>
            <th scope="row" class="text-center">{{ $no++ }}</th>
            <td>{{ $ktg->nm_kat }}</td>
            <td>{{ $ktg->slug_kat }}</td>
            <td class="text-center">
              <a href="{{ route('kategori.edit', ['kategori'=>$ktg->id_kat]) }}" class="btn btn-sm btn-warning">Edit</a>
              <a class="btn btn-sm btn-danger d-inline" href="{{ route('kategori.destroy', ['kategori'=>$ktg->id_kat]) }}" onclick="event.preventDefault(); document.getElementById('deleteData').submit();">
                  Delete
              </a>
              <form id="deleteData" action="{{ route('kategori.destroy', ['kategori'=>$ktg->id_kat]) }}" method="POST" class="d-none">
                  @csrf @method('DELETE')
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@stop
