<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request) {
        if($request->session()->has('user')) {
            $posts = Post::all();

            return view('admin', compact('posts'));
        } else {
            return redirect('/');
        }
    }

    public function add(Request $request) {
        if($request->session()->has('user')) {
            $userId = $request->session()->get('user.id');

            return view('add', compact('userId'));
        } else {
            return redirect('/');
        }
    }

    public function edit(Request $request, $id) {
        if($request->session()->has('user')) {
            return view('edit', compact('id'));
        } else {
            return redirect('/');
        }
    }
}
