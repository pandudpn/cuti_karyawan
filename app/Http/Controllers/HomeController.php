<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $judul  = 'Home';
        return view('content.home', compact('judul'));
    }
}