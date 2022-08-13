<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::get();
        $data_user = User::find(Session::get('admin_id'));
        $data_user['user'] = User::first();
        $tittle = "Data Post_Comment";
        return view('admin.post_comment.index', compact('data', 'tittle', 'data_user'));
    }
    // Insert Comment
    public function insert(Request $request)
    {
        $request->validate(Comment::$rules);
        $req = $request->all();
        $insert = Comment::create($req);
        if ($insert) {
            return redirect('post-detail/' . $req['post_id'])->with('status', 'berhasil menambah komentar');
        }
        return redirect('post-detail/' . $req['post_id'])->with('status', 'berhasil menambah komentar');
    }
}
