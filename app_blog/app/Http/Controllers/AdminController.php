<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades;

class AdminController extends Controller
{
    public function index()
    {
        $tittle = "Dashboard";
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('admin.dashboard', compact('data_user', 'tittle')); //berada di folder admin bernama dashboard
    }

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $requests   = $request->all();
        $data       = User::where('email', $requests['email'])->first();
        $cek        = Hash::check($requests['password'], $data->password);
        if ($cek) {
            Session::put('admin', $data->email);
            Session::put('admin_id', $data->id);
            return redirect('admin');
        }
        return redirect('login')->with('status', 'Email / Password Anda Salah !!');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate(User::$rules);
        $requests = $request->all();
        $requests['password'] = Hash::make($request->password);
        $requests['image'] = "";
        if ($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/admin/", $files);
            $requests['image'] = "file/admin/" . $files;
        }

        $user = User::create($requests);
        if ($user) {
            return redirect('register')->with('status', 'Anda Berhasil Mendaftar, Silahkan Login !');
        }
        return redirect('register')->with('status', 'Anda Gagal Mendaftar, Silahkan Ulangi Lagi !');
    }

    public function logout()
    {
        Session::flush();
        return redirect('login')->with('status', 'Anda Berhasil Log Out !!');
    }

    public function edit($id)
    {
        $tittle = "Update Profil";
        $data = User::find($id);
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('admin.profil.update', compact('data', 'data_user', 'tittle'));
    }

    public function update(Request $request, $id)
    {
        $cari_id = User::find($id);
        if ($cari_id == null) {
            return redirect('/admin')->with('status', 'Data Tidak Ditemukan !');
        }
        $req = $request->all();
        $req['new_password'] = Hash::make($request->password);
        if ($request->hasFile('image')) {
            if ($cari_id !== null) {
                File::delete("$cari_id->image");
            }
            $nama_file = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/admin/", $nama_file);
            $req['image'] = "file/admin/" . $nama_file;
        }

        $data = User::find($id)->update($req);
        if ($data) {
            return redirect('/admin')->with('status', 'Data Berhasil Di Update !');
        }
        return redirect('/admin')->with('status', 'Data Gagal Di Update !');
    }
}
