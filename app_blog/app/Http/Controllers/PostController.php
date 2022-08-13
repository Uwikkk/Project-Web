<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $tittle = "Data Post";
        $data = Post::get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('Admin.post.index', compact('data', 'data_user', 'tittle'));
        //compact untuk menyematkan data
    }

    public function create()
    {
        $tittle = "Tambah Data Post";
        $category = Category::get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('Admin.post.create', compact('category', 'tittle', 'data_user'));
    }

    public function insert(Request $request)
    {
        $request->validate(Post::$rules);
        $req = $request->all();
        $req['thumbnail'] = "";
        if ($request->hasFile('thumbnail')) { //apabila ada yang input gambar
            $files = Str::random("20") . "-" . $request->thumbnail->getClientOriginalName(); //set nama file
            $request->file('thumbnail')->move("file/post/", $files);
            $req['thumbnail'] = "file/post/" . $files;
        }
        $insert = Post::create($req);
        if ($insert) {
            return redirect('admin/post')->with('status', 'Berhasil Menambah Data !');
        }
        return redirect('admin/post')->with('status', 'Gagal Menambah Data !');
    }

    public function edit($id)
    {
        $tittle = "Update Data Post";
        $data = Post::find($id);
        $category = Category::get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('admin.post.update', compact('data', 'category', 'tittle', 'data_user'));
    }

    public function update(Request $request, $id)
    {
        $cari_id = Post::find($id);
        if ($cari_id == null) {
            return redirect('admin/post')->with('status', 'Data Tidak Ditemukan !');
        }

        $req = $request->all();

        if ($request->hasFile('thumbnail')) {
            if ($cari_id !== null) {
                File::delete("$cari_id->thumbnail");
            }
            $nama_file = Str::random("20") . "-" . $request->thumbnail->getClientOriginalName();
            $request->file('thumbnail')->move("file/post/", $nama_file);
            $req['thumbnail'] = "file/post/" . $nama_file;
        }

        $data = Post::find($id)->update($req);
        if ($data) {
            return redirect('admin/post')->with('status', 'Data Berhasil Di Update !');
        }
        return redirect('admin/post')->with('status', 'Data Gagal Di Update !');
    }

    public function delete($id)
    {
        $data = Post::find($id);
        if ($data == null) {
            return redirect('admin/post')->with('status', 'Data Tidak Ditemukan !');
        }

        if ($data->thumbnail !== null || $data->thumbnail = "") {
            File::delete("$data->thumbnail");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/post')->with('status', 'Data Berhasil Di Hapus !');
        }
        return redirect('admin/post')->with('status', 'Data Gagal Di Hapus !');
    }
}
