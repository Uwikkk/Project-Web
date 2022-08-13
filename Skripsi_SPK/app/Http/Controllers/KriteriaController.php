<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaController extends Controller
{
    public function index()
    {
        $title = "Data Kriteria";
        $data = Kriteria::OrderBy('nama_kriteria', 'ASC')->get();
        $data_user = User::find(Session::get('kades_id'));
        $data_user['user'] = User::first();


        return view('Kades/Kriteria/index', compact('title', 'data', 'data_user'));
    }

    public function InsertData(Request $request)
    {
        $request->validate(Kriteria::$rules);
        $req = $request->all();

        $insert = Kriteria::create($req);

        if ($insert) {
            return redirect('/kades/kriteria')->with('pesan', 'Berhasil Menambahkan Data !');
        } else {
            return redirect('/kades/kriteria')->with('status', 'Gagal Menambahkan Data !');
        }
    }

    public function editData($id)
    {
        $title = "Edit Data Kriteria";
        $data = Kriteria::find($id);
        $data_user = User::find(Session::get('kades_id'));
        $data_user['user'] = User::first();


        return view('kades/kriteria/edit', compact('title', 'data', 'data_user'));
    }

    public function UpdateData(Request $request, $id)
    {
        $findID = Kriteria::find($id);
        if ($findID == null) {
            return redirect('/kades/kriteria')->with('msg_gagal', 'Data Tidak Ditemukan !');
        }

        $request->validate(Kriteria::$rules);
        $req = $request->all();

        $update = Kriteria::find($id)->update($req);
        if ($update) {
            return redirect('/kades/kriteria')->with('msg', 'Data Berhasil Di Update !');
        } else {
            return redirect('/kades/kriteria')->with('msg_gagal', 'Gagal Update Data !');
        }
    }

    public function DeletetData($id)
    {
        $findID = Kriteria::find($id);
        if ($findID == null) {
            return redirect('/kades/kriteria')->with('msg_gagal', 'Data Tidak Ditemukan !');
        }

        $delete = $findID->delete();
        if ($delete) {
            return redirect('/kades/kriteria')->with('msg', 'Data Berhasil Dihapus !');
        } else {
            return redirect('/kades/kriteria')->with('msg_gagal', 'Gagal Menghapus Data !');
        }
    }
}
