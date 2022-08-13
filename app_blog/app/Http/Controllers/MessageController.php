<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function index()
    {
        $data = Message::get();
        $tittle = "Messages";
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        return view('admin.message.index', compact('data', 'data_user', 'tittle'));
    }

    // Insert Comment
    public function insert(Request $request)
    {
        $request->validate(Message::$rules);
        $req = $request->all();
        $Message = Message::create($req);
        if ($Message) {
            return redirect('contact')->with('status', 'Berhasil Menambahkan Komen !');
        }
        return redirect('contact')->with('status', 'Gagal Menambahkan Komen !');
    }
}
