@extends('admin.layout.app')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat Datang Di Dashboard Admin !!</h1>
</div>
<div class="row mt-4">
    <div class="col-sm-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="card-title"> <strong>Data Alternatif</strong> <small class="d-block text-muted">Jumlah Keseluruhan Data Alternatif / Kelompok Tani</small>
                </div>
                <h3 class="font-weight-bold mb-0">
                    {{ count($alternatif) }}
                </h3>
            </div>
        </div>
    </div>
    <div class="col-sm-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="card-title"> <strong>Data Kriteria</strong><small class="d-block text-muted">Jumlah Keseluruhan Kriteria</small>
                </div>
                <h3 class="font-weight-bold mb-0">
                    {{ count($kriteria) }}
                </h3>
            </div>
        </div>
    </div>
    <div class="col-sm-6 grid-margin mt-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title"> <strong>Data Pupuk</strong><small class="d-block text-muted">Jumlah Keseluruhan Jenis Pupuk Yang Dibagikan</small>
                </div>
                <h3 class="font-weight-bold mb-0">
                    {{ count($pupuk) }}
                </h3>
            </div>
        </div>
    </div>
    <div class="col-sm-6 grid-margin mt-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title"> <strong>Data Hasil</strong><small class="d-block text-muted">Jumlah Keseluruhan Hasil Perhitungan</small>
                </div>
                <h3 class="font-weight-bold mb-0">
                    {{ count($penilaian)/count($kriteria) }}
                </h3>
            </div>
        </div>
    </div>
</div>
@endsection