<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function redirect(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        return User::where('email', $email)->first();
    }
}
