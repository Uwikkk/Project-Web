<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    public function index()
    {
        $tittle = "Data Slider";
        $data = Slider::get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('admin.slider.index', compact('data', 'data_user', 'tittle'));
    }

    public function create()
    {
        $tittle = "Tambah Data Slider";
        $category = Category::get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('admin.slider.create', compact('category', 'tittle', 'data_user'));
    }

    public function insert(Request $request)
    {
        $request->validate(Slider::$rules);
        $req = $request->all();
        $req['image'] = "";
        if ($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/slider/", $files);
            $req['image'] = "file/slider/" . $files;
        }
        $insert = Slider::create($req); //insert kedalam database
        if ($insert) {
            return redirect('admin/slider')->with('status', 'Berhasil Menambah Data !');
        }
        return redirect('admin/slider')->with('status', 'Gagal Menambah Data !');
    }
    public function edit($id)
    {
        $tittle = "Update Data Slider";
        $data = Slider::find($id);
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('Admin.slider.update', compact('data', 'tittle', 'data_user'));
    }

    public function update(Request $request, $id)
    {
        $search_id = Slider::find($id);
        if ($search_id == null) {
            return redirect('admin/slider')->with('status', 'Data Tidak Ditemukan !');
        }
        $req = $request->all();
        if ($request->hasFile('image')) {
            if ($search_id !== null) {
                File::delete("$search_id->image");
            }
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/slider/", $files);
            $req['image'] = "file/slider/" . $files;
        }
        $data = Slider::find($id)->update($req);
        if ($data) {
            return redirect('admin/slider')->with('status', 'Data Berhasil Di Update !');
        }
        return redirect('admin/slider')->with('status', 'Data Gagal Di Update !');
    }

    public function delete($id)
    {
        $data = Slider::find($id);
        if ($data == null) {
            return redirect('admin/slider')->with('status', 'Data Tidak Ditemukan !');
        }
        if ($data->image !== null || $data->image = "") {
            File::delete("$data->image");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/slider')->with('status', 'Data Berhasil Di Hapus !');
        }
        return redirect('admin/slider')->with('status', 'Data Gagal Di Hapus !');
    }
}
