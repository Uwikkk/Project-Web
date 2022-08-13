@extends('kades.template.app')
@section('content')

<div class="row">

    <!-- Edit Data -->
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#TambahData" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Edit Sub Kriteria</h6>
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
                    <form action="{{ url('kades/sub_kriteria/edit/' .$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="kriteria_id" value="{{ $data->kriteria_id }}">
                        <div class="form-group">
                            <select name="pupuk_id" id="pupuk_id" class="form-control">
                                @foreach($pupuk as $p)
                                @if($data->nama_sub == 'Cabai | Urea' || $data->nama_sub == 'Jagung | Urea' || $data->nama_sub == 'Padi | Urea')
                                <option value="{{$p->id}}" {{ (1 == $p->id) ? 'selected' : ''}}>{{ $p->nama_pupuk }}</option>
                                @elseif($data->nama_sub == 'Cabai | Phonska' || $data->nama_sub == 'Jagung | Phonska' || $data->nama_sub == 'Padi | Phonska')
                                <option value="{{$p->id}}" {{ (2 == $p->id) ? 'selected' : ''}}>{{ $p->nama_pupuk }}</option>
                                @elseif($data->nama_sub == 'Cabai | ZA' || $data->nama_sub == 'Jagung | ZA' || $data->nama_sub == 'Padi | ZA')
                                <option value="{{$p->id}}" {{ (3 == $p->id) ? 'selected' : ''}}>{{ $p->nama_pupuk }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_sub">Nama Sub Kriteria</label>
                            <input type="text" name="nama_sub" id="nama_sub" class="form-control" autofocus required value="{{ $data->nama_sub }}">
                        </div>
                        <div class="form-group">
                            <label for="bobot_sub">Bobot Sub_sub Kriteria</label>
                            <input type="text" name="bobot_sub" id="bobot_sub" class="form-control" autofocus required value="{{ $data->bobot_sub }}">
                        </div>
                        <div class="float-right mb-3">
                            <a href="{{ url('/kades/kriteria/detail/'. $data->kriteria_id) }}" class="btn btn-user btn-success btn-sm">Kembali</a>
                            <input type="submit" name="submit" class="btn btn-primary btn-sm btn-user" value="Simpan"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection