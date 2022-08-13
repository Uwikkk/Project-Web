@extends('Admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-3 text-center text-dark">Form Tambah Data Main Menu</h2>
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
            <form action="{{ url('admin/mainmenu/create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="tittle" class="col-sm-2 col-form-label">Tittle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tittle" id="tittle">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="parent" class="col-sm-2 col-form-label">Parent</label>
                    <div class="col-sm-10">
                        <select name="parent" id="parent" class="form-control">
                            <option value="0">pilih Parent</option>
                            @foreach ($parent as $data)
                            <option value="{{$data->id}}">{{$data->tittle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select name="category" id="category" class="form-control">
                            <option>Pilih Category</option>
                            <option value="link">Link</option>
                            <option value="content">Content</option>
                            <option value="file">File</option>
                        </select>
                    </div>
                </div>
                <div id="contents">
                    <div class="form-group row">
                        <label for="content" class="col-sm-2 col-form-label">Content</label>
                        <textarea name="content" id="content1" class="form-control" cols="50" rows="10"></textarea>
                    </div>
                </div>
                <div id="files">
                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">File</label>
                        <div class="col-sm-10">
                            <input type="file" name="file" class="form-control" id="file">
                        </div>
                    </div>
                </div>
                <div id="links">
                    <div class="form-group row">
                        <label for="url" class="col-sm-2 col-form-label">URL</label>
                        <div class="col-sm-10">
                            <input type="link" name="url" class="form-control" id="url">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="order" class="col-sm-2 col-form-label">Order</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="order" id="order">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1">Publish</option>
                            <option value="0">Tidak Publish</option>
                        </select>
                    </div>
                </div>
                <br>

                <div class="form-group row mt-5">
                    <div class="col text-center">
                        <input type="submit" name="submit" class="btn btn-primary" value="Tambah Data"></input>
                        <a href="{{ url('admin/mainmenu') }}" class="btn btn-warning btn-md">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ url('assets/ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#contents').hide();
        $('#links').hide();
        $('#files').hide();
        $('#' + $('#category').val() + 's').show();

        $('#category').on('change', function() {
            var data = $(this).val();
            $('#contents').hide();
            $('#links').hide();
            $('#files').hide();
            $('#' + data + 's').show();
        });
    });
    var content = document.getElementById("content1");
    CKEDITOR.replace(content, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>
@endsection