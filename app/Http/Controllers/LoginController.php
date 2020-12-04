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

        $user = User::where('email', $email)->first();

        if($password == $user->password) {
            $request->session()->put('user', $user);

            return redirect('/');
        } else {
            return redirect('login');
        }
    }

    public function register() {
        return view('register');
    }

    public function forgotPassword() {
        return view('forgotPassword');
    }

    public function logout(Request $request) {
        $request->session()->flush();

        return redirect('/');
    }
}
