@extends('kades.template.app')
@section('content')

<div class="row">

    <!-- Edit Data -->
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#TambahData" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Edit Kriteria</h6>
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
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ Session::get('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="{{ url('/kades/kriteria/edit/' .$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" autofocus required value="{{ $data->nama_kriteria }}">
                        </div>
                        <div class="form-group">
                            <label for="attribut">Attribut</label>
                            <select name="attribut" id="attribut" class="form-control">
                                <option value="Benefit" {{ ('Benefit' == $data->attribut) ? 'selected' : ''}}>Benefit</option>
                                <option value="Cost" {{ ('Cost' == $data->attribut) ? 'selected' : ''}}>Cost</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="number" name="bobot" id="bobot" class="form-control" value="{{$data->bobot}}" required>
                        </div>
                        <div class="float-right mb-3">
                            <input type="submit" name="submit" class="btn btn-primary btn-sm btn-user" value="Simpan"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection