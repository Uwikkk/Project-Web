@extends('Admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Daftar Main Menu</h2>
            <hr>
            @if (Session::has('status'))
            <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
            </div>
            @endif
            <a href="{{ url('admin/mainmenu/create') }}" class="btn btn-primary btn-user mb-3">Tambah Data</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col-sm-1">No</th>
                        <th scope="col-sm-2">Tittle</th>
                        <th scope="col-sm-3">Parent</th>
                        <th scope="col-sm-3">Category</th>
                        <th scope="col-sm-3">Content</th>
                        <th scope="col-sm-3">File</th>
                        <th scope="col-sm-3">URL</th>
                        <th scope="col-sm-3">Order</th>
                        <th scope="col-sm-3">Status</th>
                        <th scope="col-sm-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $dt)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="text-center">{{ $dt->tittle }}</td>
                        <td class="text-center">{{ $dt->parent }}</td>
                        <td class="text-center">{{ $dt->category }}</td>
                        <td class="text-center">{{ $dt->content }}</td>
                        <td class="text-center">{{ $dt->file }}</td>
                        <td class="text-center">{{ $dt->url }}</td>
                        <td class="text-center">{{ $dt->order }}</td>
                        <td class="text-center">{{ $dt->status }}</td>
                        <td class="text-center">
                            <a href="{{ url('admin/mainmenu/edit/'.$dt->id) }}" class="btn btn-primary">Edit</i></a>
                            <a href="{{ url ('admin/mainmenu/delete/'.$dt->id) }}" class="btn btn-danger">Hapus</i></a>
                        </td>
                    </tr>
                    @endforeach();
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection