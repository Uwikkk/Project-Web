<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\Kriteria;
use App\Models\Pupuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KadesController extends Controller
{
    public function index()
    {
        $title = "Dashboard | Kades";
        $data_user = User::find(Session::get('kades_id'));
        $data_user['user'] = User::first();
        $alternatif = Alternatif::get();
        $penilaian = Penilaian::get();
        $kriteria = Kriteria::get();
        $pupuk = Pupuk::get();

        return view('Kades/dashboard_kades', compact('title', 'pupuk', 'data_user', 'penilaian', 'alternatif', 'kriteria'));
    }
}
