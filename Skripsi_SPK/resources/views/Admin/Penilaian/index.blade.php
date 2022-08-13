@extends('admin.layout.app')
@section('content')

<div class="row">

    <!-- Tambah Data -->
    <div class="col-md">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#TambahData" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">List Penilaian Alternatif</h6>
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
                        <a href="{{ url('admin/penilaian/create') }}" class="btn btn-user btn-primary mb-3">Tambah Data Penilaian</a>
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
                                    @if(count($valt->Penilaian) > 0)
                                    @foreach($kriteria as $key => $value)
                                    <td>
                                        @foreach($value->sub_kriteria as $k_1 => $v_1)
                                        @if($v_1->id == $valt->penilaian[$key]->sub_kriteria_id ? 'selected' : '')
                                        <input name="sub_kriteria_id[{{ $valt->id }}][]" type="text" value="{{$v_1->nama_sub}}" class="form-control" readonly>
                                        @endif
                                        @endforeach
                                    </td>
                                    @endforeach
                                    @else
                                    @foreach($kriteria as $key => $value)
                                    <td>Tidak Ada Data !!</td>
                                    @endforeach
                                    @endif
                                    <td></td>
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