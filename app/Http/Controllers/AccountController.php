<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request) {
        if($request->session()->has('user')) {
            $userId = $request->session()->get('user.id');

            return view('account', compact('userId'));
        } else {
            return redirect('/');
        }
    }
}
