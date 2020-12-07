<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request) {
        if($request->session()->has('user')) {
            $userId = $request->session()->get('user');

            return view('training', compact('userId'));
        } else {
            $userId = 0;

            return view('training', compact('userId'));
        }
    }
}
