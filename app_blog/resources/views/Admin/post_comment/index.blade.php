@extends('Admin.layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Daftar Post Comment</h2>
            <hr>
            @if (Session::has('status'))
            <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col-sm-1">No</th>
                        <th scope="col-sm-3">Post ID</th>
                        <th scope="col-sm-2">Nama</th>
                        <th scope="col-sm-3">Komentar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $dt)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="text-center">{{ $dt->post_id }}</td>
                        <td class="text-center">{{ $dt->name }}</td>
                        <td class="text-center">{{ $dt->comment }}</td>
                    </tr>
                    @endforeach();
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection