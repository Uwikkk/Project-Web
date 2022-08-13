<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Pupuk;
use App\Models\Sub_Kriteria;
use App\Models\User;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Sub_KriteriaController extends Controller
{
    public function index($id)
    {
        $title = "Sub Kriteria";
        $kriteria = Kriteria::find($id);
        $data = Sub_Kriteria::where('kriteria_id', $id)->with('Pupuk')->get();
        $pupuk = Pupuk::get();
        $data_user = User::find(Session::get('kades_id'));
        $data_user['user'] = User::first();

        return view('Kades/Sub_Kriteria/index', compact('kriteria', 'title', 'data', 'data_user', 'pupuk'));
    }

    public function InsertData(Request $request)
    {

        $request->validate(Sub_Kriteria::$rules);
        $req = $request->all();

        $insert = Sub_Kriteria::create($req);

        if ($insert) {
            return back()->with('pesan', 'Berhasil Menambahkan Data !!');
        }
    }

    public function editData($id)
    {
        $title = "Edit Data Sub Kriteria";
        $data = Sub_Kriteria::find($id);
        $pupuk = Pupuk::get();
        $data_user = User::find(Session::get('kades_id'));
        $data_user['user'] = User::first();

        return view('/Kades/Sub_Kriteria/edit', compact('title', 'data', 'data_user', 'pupuk'));
    }

    public function UpdateData(Request $request, $id)
    {
        $findID = Sub_Kriteria::find($id);
        if ($findID == null) {
            return back()->with('status', 'Data Tidak Ditemukan !');
        }

        $request->validate(Sub_Kriteria::$rules);
        $req = $request->all();

        $update = Sub_Kriteria::find($id)->update($req);
        if ($update) {
            return back()->with('pesan', 'Data Berhasil Di Update !');
        } else {
            return back()->with('status', 'Gagal Update Data !');
        }
    }

    public function DeletetData($id)
    {
        $findID = Sub_Kriteria::find($id);
        if ($findID == null) {
            return back()->with('msg_gagal', 'Data Tidak Ditemukan !');
        }

        $delete = $findID->delete();
        if ($delete) {
            return back()->with('msg', 'Data Berhasil Dihapus !');
        } else {
            return back()->with('msg_gagal', 'Gagal Menghapus Data !');
        }
    }
}
