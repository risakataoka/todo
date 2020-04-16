<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function top()
    {
        if (Auth::check()) {
            return view('home');
        } else {
            return view('top');
        }
    }
}
