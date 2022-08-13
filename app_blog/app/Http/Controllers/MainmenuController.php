<?php

namespace App\Http\Controllers;

use App\Models\MainMenu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Facades;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MainmenuController extends Controller
{
    public function index()
    {
        $tittle = "Data Main Menu";
        $data = MainMenu::get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('admin.main_menu.index', compact('data', 'data_user', 'tittle'));
    }

    public function create()
    {
        $tittle = "Tambah Data Main Menu";
        $parent = MainMenu::get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('admin.main_menu.create', compact('parent', 'tittle', 'data_user'));
    }

    public function insert(Request $request)
    {
        $request->validate(MainMenu::$rules);
        $req = $request->all();
        $req['file'] = "";
        if ($request->hasFile('file')) {
            $files = Str::random("20") . "-" . $request->file->getClientOriginalName();
            $request->file('file')->move("file/Files/", $files);
            $req['file'] = "file/Files/" . $files;
        }
        $insert = MainMenu::create($req); //insert kedalam database
        if ($insert) {
            return redirect('admin/mainmenu')->with('status', 'Berhasil Menambah Data !');
        }
        return redirect('admin/mainmenu')->with('status', 'Gagal Menambah Data !');
    }
    public function edit($id)
    {
        $tittle = "Update Data Main Menu";
        $data = MainMenu::find($id);
        $parent = MainMenu::get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('Admin.main_menu.update', compact('data', 'parent', 'tittle', 'data_user'));
    }

    public function update(Request $request, $id)
    {
        $search_id = MainMenu::find($id);
        if ($search_id == null) {
            return redirect('admin/mainmenu')->with('status', 'Data Tidak Ditemukan !');
        }
        $req = $request->all();
        $req['file'] = "";
        if ($request->hasFile('file')) {
            if ($search_id !== null) {
                File::delete("$search_id->file");
            }
            $files = Str::random("20") . "-" . $request->file->getClientOriginalName();
            $request->file('file')->move("file/Files/", $files);
            $req['file'] = "file/Files/" . $files;
        }
        $data = MainMenu::find($id)->update($req);
        if ($data) {
            return redirect('admin/mainmenu')->with('status', 'Data Berhasil Di Update !');
        }
        return redirect('admin/mainmenu')->with('status', 'Data Gagal Di Update !');
    }

    public function delete($id)
    {
        $data = MainMenu::find($id);
        if ($data == null) {
            return redirect('admin/mainmenu')->with('status', 'Data Tidak Ditemukan !');
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/mainmenu')->with('status', 'Data Berhasil Di Hapus !');
        }
        return redirect('admin/mainmenu')->with('status', 'Data Gagal Di Hapus !');
    }
}
