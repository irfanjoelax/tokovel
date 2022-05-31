@extends('adminlte::page')

@section('title', config('app.name').' - Profile')

@section('content')
<x-alert></x-alert>
<div class="card">
    <div class="card-header bg-white">
        <h3>Profile & Change Password</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('admin/profile') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Change Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="***">
                    <small class="form-text text-danger">kosongkan jika tidak ingin diubah.</small>
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
