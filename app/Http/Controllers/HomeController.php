<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class HomeController extends Controller
{
    public function index(){
        $title  = 'Home';
        $staff  = Staff::where('id', session('id'))->first();
        return view('content.home', compact('title', 'staff'));
    }
}
