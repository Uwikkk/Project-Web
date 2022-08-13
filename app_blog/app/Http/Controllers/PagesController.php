<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\User;
use App\Models\Comment;
use App\Models\MainMenu;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
        $tittle = "My Blog";
        $data['slider'] = Slider::where('status', 1)->get();
        $data['post'] = Post::where('status', 1)->get();
        $data['latespost'] = Post::where('status', 1)->limit(5)->get();
        $data['headline'] = Post::where('status', 1)->where('is_headline', 1)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();

        return view('user.index', compact('data', 'tittle'));
    }

    public function about()
    {
        $tittle = "About";
        $data['post'] = Post::where('status', 1)->get();
        $data['latespost'] = Post::where('status', 1)->limit(5)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();

        return view('user.about', compact('data', 'tittle'));
    }

    public function contact()
    {
        $tittle = "Contact";
        $data['post'] = Post::where('status', 1)->get();
        $data['latespost'] = Post::where('status', 1)->limit(5)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();

        return view('user.contact', compact('data', 'tittle'));
    }

    public function post()
    {
        $tittle = "Post";
        $data['post'] = Post::where('status', 1)->get();
        $data['latespost'] = Post::where('status', 1)->limit(5)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();

        return view('user.post', compact('data', 'tittle'));
    }
    public function postDetail($id)
    {
        $tittle = "Post Detail";
        $data['post'] = Post::where('status', 1)->get();
        $data['latespost'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['comment'] = Comment::where('post_id', $id)->get();
        $data['user'] = User::first();
        $post = Post::find($id);

        return view('user.post-detail', compact('data', 'post', 'tittle'));
    }
    public function menu($id)
    {
        $tittle = "Menu";
        $data['post'] = Post::where('status', 1)->get();
        $data['latespost'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['user'] = User::first();
        $data['menu'] = MainMenu::find($id);

        return view('user.menu', compact('data', 'tittle'));
    }
    public function category($id)
    {
        $tittle = "Category";
        $data['post'] = Post::where('status', 1)->where('category_id', $id)->get();
        $data['latespost'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['user'] = User::first();

        return view('user.category', compact('data', 'tittle'));
    }
    public function search(Request $request)
    {
        $tittle = "Search";
        $data['post'] = Post::where('status', 1)
            ->where('tittle', 'LIKE', '%' . $request->search . '%')
            ->orWhere('content', 'LIKE', '%' . $request->search . '%')->get();
        $data['latespost'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['user'] = User::first();

        return view('user.search', compact('data', 'tittle'));
    }
}
