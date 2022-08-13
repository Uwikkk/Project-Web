@extends('Admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-3 text-center text-dark">Form Tambah Data Category</h2>
            <hr>
        </div>
        <div class="col-md-7">
            <div class="col-md">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $eror)
                        <li>{{ $eror }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <form action="{{ url('admin/category/create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-2">
                        <img src="/file/default.png" class="img-thumbnail img-priview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" onchange="priviewImage()">
                            <label class="custom-file-label" for="image">Pilih Gambar</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col-md-10 text-center">
                        <input type="submit" name="submit" class="btn btn-primary" value="Tambah Data"></input>
                        <a href="{{ url('admin/category') }}" class="btn btn-warning btn-md">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection