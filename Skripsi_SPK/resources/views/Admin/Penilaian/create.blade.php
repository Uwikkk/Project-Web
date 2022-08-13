@extends('admin.layout.app')
@section('content')

<div class="row">

    <!-- Tambah Data -->
    <div class="col-md">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#TambahData" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Penilaian Alternatif</h6>
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
                    <div class="table-responsive">
                        <form action="{{ url('/admin/penilaian/create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="float-right">
                                <a href="{{ url('admin/penilaian') }}" class="btn btn-success btn-user">Kembali</a>
                                <input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-user">
                            </div>
                            <br><br><br>
                            <div class="form-group row">
                                <label for="pupuk_id" class="col-sm-3 col-form-label">Jenis Pupuk</label>
                                <div class="col-sm-9">
                                    <select name="pupuk_id" id="pupuk_id" class="form-control">
                                        <option>Pilih Jenis Pupuk Yang Akan Dibagikan</option>
                                        <option value="1">Urea</option>
                                        <option value="2">Phonska</option>
                                        <option value="3">ZA</option>
                                    </select>
                                </div>
                            </div>
                            <div id="1">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Alternatif</th>
                                            @foreach($kriteria as $key => $value)
                                            <th>{{$value->nama_kriteria}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($alternatif as $alt => $valt)
                                        <tr>
                                            <input type="hidden" name="alternatif_id" value="{{$valt->id}}">
                                            <td>{{$valt->nama_alternatif}}</td>
                                            @foreach($kriteria as $key => $value)
                                            <td>
                                                <select name="sub_kriteria_id_1[{{ $valt->id }}][]" id="sub_kriteria_id" class="form-control">
                                                    @foreach($value->sub_kriteria as $k_1 => $v_1)
                                                    @if($v_1->pupuk_id == 1 || $v_1->pupuk_id == 123)
                                                    <option value="{{ $v_1->id }}">{{ $v_1->nama_sub }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            @endforeach
                                            <td></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="2">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Alternatif</th>
                                            @foreach($kriteria as $key => $value)
                                            <th>{{$value->nama_kriteria}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($alternatif as $alt => $valt)
                                        <tr>
                                            <input type="hidden" name="alternatif_id" value="{{$valt->id}}">
                                            <td>{{$valt->nama_alternatif}}</td>
                                            @foreach($kriteria as $key => $value)
                                            <td>
                                                <select name="sub_kriteria_id_2[{{ $valt->id }}][]" id="sub_kriteria_id" class="form-control">
                                                    @foreach($value->sub_kriteria as $k_1 => $v_1)
                                                    @if($v_1->pupuk_id == 2 || $v_1->pupuk_id == 123)
                                                    <option value="{{ $v_1->id }}">{{ $v_1->nama_sub }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            @endforeach
                                            <td></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Alternatif</th>
                                            @foreach($kriteria as $key => $value)
                                            <th>{{$value->nama_kriteria}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($alternatif as $alt => $valt)
                                        <tr>
                                            <input type="hidden" name="alternatif_id" value="{{$valt->id}}">
                                            <td>{{$valt->nama_alternatif}}</td>
                                            @foreach($kriteria as $key => $value)
                                            <td>
                                                <select name="sub_kriteria_id[{{ $valt->id }}][]" id="sub_kriteria_id" class="form-control">
                                                    @foreach($value->sub_kriteria as $k_1 => $v_1)
                                                    @if($v_1->pupuk_id == 3 || $v_1->pupuk_id == 123)
                                                    <option value="{{ $v_1->id }}">{{ $v_1->nama_sub }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            @endforeach
                                            <td></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#1').hide();
        $('#2').hide();
        $('#3').hide();
        $('#' + $('#pupuk_id').val()).show();
        $('#pupuk_id').on('change', function() {
            var data = $(this).val();
            $('#1').hide().removeData;
            $('#2').hide().removeData;
            $('#3').hide().removeData;
            $('#' + data).show();
        });
    });
    var content = document.getElementById("content1");
    CKEDITOR.replace(content, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>
@endsection