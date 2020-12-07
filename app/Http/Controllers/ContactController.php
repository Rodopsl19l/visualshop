<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request) {
        if($request->session()->has('user')) {
            $userId = $request->session()->get('user.id');

            return view('contact', compact('userId'));
        } else {
            $userId = 0;

            return view('contact', compact('userId'));
        }
    }
}
