<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Pupuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function home()
    {
        $title = "Dashboard | Admin";
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        $alternatif = Alternatif::get();
        $penilaian = Penilaian::get();
        $kriteria = Kriteria::get();
        $pupuk = Pupuk::get();

        return view('Admin/dashboard', compact('title', 'pupuk', 'data_user', 'penilaian', 'alternatif', 'kriteria'));
    }


    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $req = $request->all();
        $req['password'] = Hash::make($request->password);

        $insert = User::create($req);

        if ($insert) {
            return back()->with('pesan', 'Anda Berhasil Mendaftar, Silahkan Login !');
        } else {
            return back()->with('status', 'Anda Gagal Mendaftar, Silahkan Coba Lagi !');
        }
    }

    public function postLogin(Request $request)
    {
        $data = User::where('email', $request['email'])->first();
        $cek = Hash::check($request->password, $data->password);
        if ($cek) {
            if ($data->role == 'Admin') {
                Session::put('admin', $data->email);
                Session::put('role', $data->role);
                Session::put('admin_id', $data->id);

                return redirect('/admin');
            } elseif ($data->role == 'Kades') {
                Session::put('kades', $data->email);
                Session::put('role', $data->role);
                Session::put('kades_id', $data->id);

                return redirect('/kades');
            }
        } else {
            return back()->with('status', 'Email / Password Anda Salah !!');
        }
    }

    public function logout()
    {
        Session::flush();

        return redirect('/')->with('pesan', 'Anda Berhasil Log Out !');
    }
}
