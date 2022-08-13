<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class PerhitunganController extends Controller
{
    public function index()
    {
        $title = "Perhitungan Nilai Alternatif";
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        $alternatif = Alternatif::with('Penilaian.Pupuk.Sub_Kriteria')->get();
        $kriteria = Kriteria::with('Sub_Kriteria')->get();
        $penilaian = Penilaian::with('Sub_Kriteria', 'Alternatif', 'Pupuk')->get();

        if (count($penilaian) == 0) {
            return redirect('admin/penilaian')->with('status', 'Data Penilaian Kosong, Silahkan Input Dulu !!');
        }

        //Mencari Min Max
        foreach ($kriteria as $key => $value) {
            foreach ($penilaian as $k_1 => $v_1) {
                if ($value->id == $v_1->Sub_Kriteria->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $minMax[$value->id][] = $v_1->Sub_Kriteria->bobot_sub;
                    } elseif ($value->attribut == 'Cost') {
                        $minMax[$value->id][] = $v_1->Sub_Kriteria->bobot_sub;
                    }
                }
            }
        }

        //Normalisasi
        foreach ($penilaian as $k_1 => $v_1) {
            foreach ($kriteria as $key => $value) {
                if ($value->id == $v_1->Sub_Kriteria->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $normalisasi[$v_1->Alternatif->nama_alternatif][$value->id] = $v_1->Sub_Kriteria->bobot_sub / max($minMax[$value->id]);
                    } elseif ($value->attribut == 'Cost') {
                        $normalisasi[$v_1->Alternatif->nama_alternatif][$value->id] = min($minMax[$value->id])  / $v_1->Sub_Kriteria->bobot_sub;
                    }
                }
            }
        }

        // Perangkingan
        foreach ($normalisasi as $key => $value) {
            foreach ($kriteria as $key_1 => $value_1) {
                $rank[$key][] = $value[$value_1->id] * ($value_1->bobot / 100);
            }
        }

        $rangking = $normalisasi;

        foreach ($rangking as $key => $value) {
            $sort[$key][] = array_sum($rank[$key]);
        }

        arsort($sort);

        return view('Admin/Perhitungan/index', compact('title', 'data_user', 'alternatif', 'kriteria', 'normalisasi', 'penilaian', 'sort'));
    }

    public function perhitungan_kades()
    {
        $title = "Perhitungan Nilai Alternatif";
        $data_user = User::find(Session::get('kades_id'));
        $data_user['user'] = User::first();

        $alternatif = Alternatif::with('Penilaian.Pupuk.Sub_Kriteria')->get();
        $kriteria = Kriteria::with('Sub_Kriteria')->get();
        $penilaian = Penilaian::with('Sub_Kriteria', 'Alternatif', 'Pupuk')->get();

        if (count($penilaian) == 0) {
            return redirect('kades')->with('status', 'Data Penilaian Kosong, Silahkan Input Dulu !!');
        }

        //Mencari Min Max
        foreach ($kriteria as $key => $value) {
            foreach ($penilaian as $k_1 => $v_1) {
                if ($value->id == $v_1->Sub_Kriteria->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $minMax[$value->id][] = $v_1->Sub_Kriteria->bobot_sub;
                    } elseif ($value->attribut == 'Cost') {
                        $minMax[$value->id][] = $v_1->Sub_Kriteria->bobot_sub;
                    }
                }
            }
        }

        //Normalisasi
        foreach ($penilaian as $k_1 => $v_1) {
            foreach ($kriteria as $key => $value) {
                if ($value->id == $v_1->Sub_Kriteria->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $normalisasi[$v_1->Alternatif->nama_alternatif][$value->id] = $v_1->Sub_Kriteria->bobot_sub / max($minMax[$value->id]);
                    } elseif ($value->attribut == 'Cost') {
                        $normalisasi[$v_1->Alternatif->nama_alternatif][$value->id] = min($minMax[$value->id])  / $v_1->Sub_Kriteria->bobot_sub;
                    }
                }
            }
        }

        // Perangkingan
        foreach ($normalisasi as $key => $value) {
            foreach ($kriteria as $key_1 => $value_1) {
                $rank[$key][] = $value[$value_1->id] * ($value_1->bobot / 100);
            }
        }

        $rangking = $normalisasi;

        foreach ($rangking as $key => $value) {
            $sort[$key][] = array_sum($rank[$key]);
        }

        arsort($sort);

        return view('Kades/Perhitungan/index', compact('sort', 'title', 'data_user', 'alternatif', 'kriteria', 'normalisasi', 'penilaian'));
    }
}
