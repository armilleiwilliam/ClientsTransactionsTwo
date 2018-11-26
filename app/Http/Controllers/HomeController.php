<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        return view('home');
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        return redirect()->guest('login');
    }
}
