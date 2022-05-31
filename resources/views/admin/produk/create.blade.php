@extends('adminlte::page')

@section('title', config('app.name').' - Produk')

@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h4 class="my-auto d-flex justify-content-between">
            Tambah Data Produk
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="T-shirt, Clock, etc" value="{{ old('nama') }}">
                    @error('nama') 
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-6">
                    <select class="custom-select @error('kategori') is-invalid @enderror" name="kategori">
                        <option selected value="">pilih kategori</option>
                        @foreach ($kategoris as $ktg)
                            <option value="{{ $ktg->id_kat }}" {{ (old('kategori') == $ktg->id_kat) ? 'selected' : '' }}>
                                {{ $ktg->nm_kat }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori') 
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="15000" value="{{ old('harga') }}">
                    @error('harga') 
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" placeholder="0" value="{{ old('stok') }}">
                    @error('stok') 
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="berat" class="col-sm-2 col-form-label">Berat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control @error('berat') is-invalid @enderror" name="berat" placeholder="dalam hitungan gram" value="{{ old('berat') }}">
                    @error('berat') 
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-2">
                    <img src="{{ asset('img/produk/default.png')}}" class="img-thumbnail img-preview" alt="">
                </div>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" name="gambar" id="gambar" onchange="imgPreview()">
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="custom-file-label" for="gambar">pilih gambar produk</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea row="3" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') 
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    function imgPreview() {
        const gambar = document.querySelector('#gambar');
        const gambarLabel = document.querySelector('.custom-file-label');
        const gambarPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);
        fileGambar.onload = function(e) {
        gambarPreview.src = e.target.result;
        }
    }

    $('#deskripsi').summernote({
        placeholder: 'tulikan deskripsi dan tidak boleh kosong',
        height: 100
      });
</script>
@stop