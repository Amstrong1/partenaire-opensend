<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $balance = Auth::user()->balance;
        return view('dashboard', compact('balance'));
    }
}
