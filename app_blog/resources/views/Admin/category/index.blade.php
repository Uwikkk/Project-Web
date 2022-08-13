@extends('Admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Daftar Category</h2>
            <hr>
            @if (Session::has('status'))
            <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
            </div>
            @endif
            <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-user mb-3">Tambah Data</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col-sm-1">No</th>
                        <th scope="col-sm-2">Name</th>
                        <th scope="col-sm-3">Image</th>
                        <th scope="col-sm-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $dt)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="text-center">{{ $dt->name }}</td>
                        <td class="text-center"><img width="100px" src="{{ url($dt->image) }}" alt="Image"></td>
                        <td class="text-center">
                            <a href="{{ url('admin/category/edit/'.$dt->id) }}" class="btn btn-primary">Edit</i></a>
                            <a href="{{ url ('admin/category/delete/'.$dt->id) }}" class="btn btn-danger">Hapus</i></a>
                        </td>
                    </tr>
                    @endforeach();
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection