@extends('Admin.Layouts.Index')
@section('Pages')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="text-center">
        <img src="{{ asset('/assets/img/logoPT.png') }}" alt="" width="500" height="300">
        <h2>Selamat Datang di Panel Admin, {{ auth()->user()->name }}!</h2>
    </div>
@endsection
