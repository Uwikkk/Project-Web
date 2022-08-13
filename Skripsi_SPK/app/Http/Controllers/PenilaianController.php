<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Pupuk;
use App\Models\Sub_Kriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PenilaianController extends Controller
{
    public function index()
    {
        $title = "Penilaian Alternatif";
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        $kriteria = Kriteria::with('Sub_Kriteria')->get();
        $alternatif = Alternatif::with('Penilaian.Sub_Kriteria')->get();
        $pupuk = Pupuk::orderBy('nama_pupuk', 'ASC')->get();

        return view('Admin/Penilaian/index', compact('kriteria', 'alternatif', 'title', 'data_user', 'pupuk'));
    }

    public function tambahData()
    {
        $title = "Tambah Data Penilaian Alternatif";
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        $kriteria = Kriteria::with('Sub_Kriteria')->get();
        $alternatif = Alternatif::with('Penilaian.Sub_Kriteria')->get();
        $pupuk = Pupuk::orderBy('nama_pupuk', 'ASC')->get();

        return view('Admin/Penilaian/create', compact('kriteria', 'alternatif', 'title', 'data_user', 'pupuk'));
    }

    public function InsertData(Request $request)
    {
        DB::select("TRUNCATE penilaian");
        $pupuk_id = $request->pupuk_id;

        if ($pupuk_id == 1) {
            foreach ($request->sub_kriteria_id_1 as $key => $value) {
                foreach ($value as $k_1 => $v_1) {
                    Penilaian::create([
                        'pupuk_id'          => $pupuk_id,
                        'alternatif_id'     => $key,
                        'sub_kriteria_id'   => $v_1
                    ]);
                }
            }
        } elseif ($pupuk_id == 2) {
            foreach ($request->sub_kriteria_id_2 as $key => $value) {
                foreach ($value as $k_1 => $v_1) {
                    Penilaian::create([
                        'pupuk_id'          => $pupuk_id,
                        'alternatif_id'     => $key,
                        'sub_kriteria_id'   => $v_1
                    ]);
                }
            }
        } elseif ($pupuk_id == 3) {
            foreach ($request->sub_kriteria_id_3 as $key => $value) {
                foreach ($value as $k_1 => $v_1) {
                    Penilaian::create([
                        'pupuk_id'          => $pupuk_id,
                        'alternatif_id'     => $key,
                        'sub_kriteria_id'   => $v_1
                    ]);
                }
            }
        }

        return back()->with('pesan', 'Berhasil Menambahkan Data !!');
    }
}
