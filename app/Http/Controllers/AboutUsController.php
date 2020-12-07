<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(Request $request) {
        if($request->session()->has('user')) {
            $userId = $request->session()->get('user');

            return view('aboutUs', compact('userId'));
        } else {
            $userId = 0;

            return view('aboutUs', compact('userId'));
        }
    }
}
