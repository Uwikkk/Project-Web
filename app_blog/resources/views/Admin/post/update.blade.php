@extends('Admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-3 text-center text-dark">Form Update Data Post</h2>
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
            <form action="{{ url('admin/post/edit/'. $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="imageLama" value="{{$data->thumbnail}}">
                <div class="form-group row">
                    <label for="tittle" class="col-sm-2 col-form-label">Tittle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tittle" id="tittle" value="{{$data->tittle}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Thumbnail</label>
                    <div class="col-sm-2">
                        <img src="/{{$data->thumbnail}}" class="img-thumbnail img-priview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="thumbnail" onchange="priviewImage()">
                            <label class="custom-file-label" for="image">{{$data->thumbnail}}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($category as $cat)
                            <option value="{{$cat->id}}" {{ ($cat->id == $data->category_id) ? 'selected' : '' }}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="is_headline" class="col-sm-2 col-form-label">Headline</label>
                    <div class="col-sm-10">
                        <select name="is_headline" id="is_headline" class="form-control">
                            <option value="0" {{ (0 == $data->is_headline) ? 'selected' : '' }}>Tidak Headline</option>
                            <option value="1" {{ (1 == $data->is_headline) ? 'selected' : '' }}>Headline</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ (1 == $data->status) ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ (0 == $data->status) ? 'selected' : '' }}>Tidak Publish</option>
                        </select>
                    </div>
                </div>
                <br>
                <textarea name="content" id="content1" class="form-control" cols="50" rows="10">{{$data->content}}</textarea>
                <div class="form-group row mt-5">
                    <div class="col-md-10">
                        <input type="submit" name="submit" class="btn btn-primary" value="Update Data"></input>
                        <a href="{{ url('admin/post') }}" class="btn btn-warning btn-md">Kembali</a>
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
    var content = document.getElementById("content1");
    CKEDITOR.replace(content, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>
@endsection