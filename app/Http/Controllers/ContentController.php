<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(Request $request, $id) {
        if($request->session()->has('user')) {
            $userId = $request->session()->get('user.id');
            return view('content', compact('id', 'userId'));
        } else {
            return redirect('/');
        }
    }
}
