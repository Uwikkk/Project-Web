@extends('kades.template.app')
@section('content')

<div class="row">
    <!-- Tahap Analisa -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#analisa" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Tahap Analisa (Mengganti Nilai Alternatif)</h6>
            </a>
            <div class="collapse show" id="analisa">
                <div class="card-body">
                    <div class="table-responsive">
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
                                    <td>{{$valt->nama_alternatif}}</td>
                                    @if(count($valt->penilaian) > 0)
                                    @foreach($valt->penilaian as $key => $value)
                                    <td>{{$value->sub_kriteria->bobot_sub}}</td>
                                    @endforeach
                                    @endif
                                </tr>
                                <tr>
                                    @if(count($valt->penilaian) == 0)
                                    <td>Tidak Ada Data !!</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tahap Normalisasi -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#Normalisasi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Tahap Normalisasi</h6>
            </a>
            <div class="collapse show" id="Normalisasi">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Alternatif / Kriteria</th>
                                    @foreach($kriteria as $key => $value)
                                    <th>{{$value->nama_kriteria}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($normalisasi as $key => $value)
                                <tr>
                                    <td>{{$key}}</td>
                                    @foreach($value as $key_1 => $value_1)
                                    <td>{{ number_format($value_1,2)}}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tahap Perangkingan -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#Perangkingan" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Tahap Perangkingan</h6>
            </a>
            <div class="collapse show" id="Perangkingan">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th>Nilai Prefensi (Vi)</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($sort as $key => $value)
                                <tr>
                                    <td>{{$key}}</td>
                                    @foreach($value as $key_1 => $value_1)
                                    <td>{{ number_format($value_1,3) }}</td>
                                    @endforeach
                                    <td>{{$i++}}</td>
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