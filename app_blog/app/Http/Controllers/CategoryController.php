<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // menampilkan semua data di index
    public function index()
    {
        $tittle = "Data Category";
        $data = Category::get(); //read data
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('Admin.category.index', compact('data', 'data_user', 'tittle'));
        //compact untuk menyematkan data
    }

    public function create()
    {
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        $tittle = "Tambah Data Category";
        return view('Admin.category.create', compact('tittle', 'data_user'));
    }

    public function insert_data(Request $request)
    {
        $request->validate(Category::$rules);
        $req = $request->all();
        $req['image'] = " ";
        if ($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/category/", $files);
            $req['image'] = "file/category/" . $files;
        }
        $insert = Category::create($req); //insert kedalam database
        if ($insert) {
            return redirect('admin/category')->with('status', 'Berhasil Menambah Data !');
        }
        return redirect('admin/category')->with('status', 'Gagal Menambah Data !');
    }

    public function edit($id)
    {
        $tittle = "Update Data Category";
        $data = Category::find($id);
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('Admin.category.update', compact('data', 'tittle', 'data_user'));
    }

    public function update(Request $request, $id)
    {
        $search_id = Category::find($id);
        if ($search_id == null) {
            return redirect('admin/category')->with('status', 'Data Tidak Ditemukan !');
        }

        $req = $request->all();

        if ($request->hasFile('image')) {
            if ($search_id !== null) {
                File::delete("$search_id->image");
            }
            $category = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/category/", $category);
            $req['image'] = "file/category/" . $category;
        }

        $data = Category::find($id)->update($req);
        if ($data) {
            return redirect('admin/category')->with('status', 'Data Berhasil Di Update !');
        }
        return redirect('admin/category')->with('status', 'Data Gagal Di Update !');
    }

    public function delete($id)
    {
        $data = Category::find($id);
        if ($data == null) {
            return redirect('admin/category')->with('status', 'Data Tidak Ditemukan !');
        }
        if ($data->image !== null || $data->image = "") {
            File::delete("$data->image");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/category')->with('status', 'Data Berhasil Di Hapus !');
        }
        return redirect('admin/category')->with('status', 'Data Gagal Di Hapus !');
    }
}
