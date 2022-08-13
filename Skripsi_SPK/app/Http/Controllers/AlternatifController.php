<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;

class AlternatifController extends Controller
{
    public function index()
    {
        $title = "Data Alternatif";
        $data = Alternatif::OrderBy('nama_alternatif', 'ASC')->get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();


        return view('Admin/Alternatif/index', compact('title', 'data', 'data_user'));
    }

    public function alternatif_kades()
    {
        $title = "Data Alternatif";
        $data = Alternatif::OrderBy('nama_alternatif', 'ASC')->get();
        $data_user = User::find(Session::get('kades_id'));
        $data_user['user'] = User::first();


        return view('Kades/Alternatif/index', compact('title', 'data', 'data_user'));
    }

    public function InsertData(Request $request)
    {
        $request->validate(Alternatif::$rules);
        $req = $request->all();

        $insert = Alternatif::create($req);

        if ($insert) {
            return redirect('/admin/alternatif')->with('pesan', 'Berhasil Menambahkan Data !');
        } else {
            return redirect('/admin/alternatif')->with('status', 'Gagal Menambahkan Data !');
        }
    }

    public function editData($id)
    {
        $title = "Edit Data Alternatif";
        $data = Alternatif::find($id);
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();


        return view('admin/alternatif/edit', compact('title', 'data', 'data_user'));
    }

    public function UpdateData(Request $request, $id)
    {
        $findID = Alternatif::find($id);
        if ($findID == null) {
            return redirect('/admin/alternatif')->with('msg_gagal', 'Data Tidak Ditemukan !');
        }

        $request->validate(Alternatif::$rules);
        $req = $request->all();

        $update = Alternatif::find($id)->update($req);
        if ($update) {
            return redirect('/admin/alternatif')->with('msg', 'Data Berhasil Di Update !');
        } else {
            return redirect('/admin/alternatif')->with('msg_gagal', 'Gagal Update Data !');
        }
    }

    public function DeletetData($id)
    {
        $findID = Alternatif::find($id);
        if ($findID == null) {
            return redirect('/admin/alternatif')->with('msg_gagal', 'Data Tidak Ditemukan !');
        }

        $delete = $findID->delete();
        if ($delete) {
            return redirect('/admin/alternatif')->with('msg', 'Data Berhasil Dihapus !');
        } else {
            return redirect('/admin/alternatif')->with('msg_gagal', 'Gagal Menghapus Data !');
        }
    }
}
