<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('admin', compact('posts'));
    }

    public function add(Request $request) {
        if($request->session()->has('user')) {
            $userId = $request->session()->get('user.id');

            return view('add', compact('userId'));
        }

        return view('add');
    }
}
