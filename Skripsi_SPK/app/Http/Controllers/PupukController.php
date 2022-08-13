<?php

namespace App\Http\Controllers;

use App\Models\Pupuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PupukController extends Controller
{
    public function index()
    {
        $title = "Data Pupuk";
        $data = Pupuk::OrderBy('nama_pupuk', 'ASC')->get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();


        return view('Admin/pupuk/index', compact('title', 'data', 'data_user'));
    }

    public function pupuk_kades()
    {
        $title = "Data Pupuk";
        $data = Pupuk::OrderBy('nama_pupuk', 'ASC')->get();
        $data_user = User::find(Session::get('kades_id'));
        $data_user['user'] = User::first();


        return view('Kades/pupuk/index', compact('title', 'data', 'data_user'));
    }

    public function InsertData(Request $request)
    {
        $request->validate(Pupuk::$rules);
        $req = $request->all();

        $insert = Pupuk::create($req);

        if ($insert) {
            return redirect('/admin/pupuk')->with('pesan', 'Berhasil Menambahkan Data !');
        } else {
            return redirect('/admin/pupuk')->with('status', 'Gagal Menambahkan Data !');
        }
    }

    public function editData($id)
    {
        $title = "Edit Data Pupuk";
        $data = Pupuk::find($id);
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();


        return view('admin/pupuk/edit', compact('title', 'data', 'data_user'));
    }

    public function UpdateData(Request $request, $id)
    {
        $findID = Pupuk::find($id);
        if ($findID == null) {
            return redirect('/admin/pupuk')->with('msg_gagal', 'Data Tidak Ditemukan !');
        }

        $request->validate(Pupuk::$rules);
        $req = $request->all();

        $update = Pupuk::find($id)->update($req);
        if ($update) {
            return redirect('/admin/pupuk')->with('msg', 'Data Berhasil Di Update !');
        } else {
            return redirect('/admin/pupuk')->with('msg_gagal', 'Gagal Update Data !');
        }
    }

    public function DeletetData($id)
    {
        $findID = Pupuk::find($id);
        if ($findID == null) {
            return redirect('/admin/pupuk')->with('msg_gagal', 'Data Tidak Ditemukan !');
        }

        $delete = $findID->delete();
        if ($delete) {
            return redirect('/admin/pupuk')->with('msg', 'Data Berhasil Dihapus !');
        } else {
            return redirect('/admin/pupuk')->with('msg_gagal', 'Gagal Menghapus Data !');
        }
    }
}
