@extends('kades.template.app')
@section('css')
<!-- Custom styles for this page -->
<link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="row">

    <!-- Tambah Data -->
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#TambahData" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Kriteria</h6>
            </a>
            <div class="collapse show" id="TambahData">
                <div class="card-body">
                    @if (Session::has('pesan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('pesan') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (Session::has('status'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="{{ url('/kades/kriteria/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="attribut">Attribut</label>
                            <select name="attribut" id="attribut" class="form-control">
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="number" name="bobot" id="bobot" class="form-control" required>
                        </div>
                        <div class="float-right mb-3">
                            <input type="submit" name="submit" class="btn btn-primary btn-sm btn-user" value="Simpan"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- List Data -->
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#ListData" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">List Kriteria</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="ListData">
                <div class="card-body">
                    <div class="table-responsive">
                        @if (Session::has('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if (Session::has('msg_gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('msg_gagal') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <table class="table table-striped table-hover" id="DataTabel">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kriteria</th>
                                    <th>Attribut</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($data as $dt)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $dt->nama_kriteria }}</td>
                                    <td>{{ $dt->attribut }}</td>
                                    <td>{{ $dt->bobot }}%</td>
                                    <td>
                                        <a href="{{ url ('/kades/kriteria/detail/'.$dt->id) }}" class="btn btn-circle btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ url ('/kades/kriteria/edit/'.$dt->id) }}" class="btn btn-circle btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="#" data_id="{{ $dt->id }}" data_nama="{{ $dt->nama_kriteria }}" class="btn btn-circle btn-danger btn-sm hapus"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<!-- Page level plugins -->
<script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/sweetalert.js"></script>
<script>
    $(document).ready(function() {
        $('#DataTabel').DataTable();

        $('.hapus').on('click', function() {
            var id = $(this).attr('data_id');
            var nama = $(this).attr('data_nama');
            swal({
                    title: "Apakah Anda Yakin Ingin Menghapus Data " + nama + " ?",
                    text: "Sekali Anda Hapus, Data Tidak Dapat Dikembalikan !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/kades/kriteria/delete/" + id + " "
                        swal("Data Berhasil Dihapus !", {
                            icon: "success",
                        });
                    } else {
                        swal("Data Anda Aman !");
                    }
                });
        });
    });
</script>
@endsection