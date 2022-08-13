@extends('Admin.layout.main')

@section('content')
@if (Session::has('status'))
<div class="alert alert-warning" role="alert">
    {{ Session::get('status') }}
</div>
@endif
<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
<p>Selamat Datang, {{$data_user->name}} Di Halaman Dashboard</p>
@endsection