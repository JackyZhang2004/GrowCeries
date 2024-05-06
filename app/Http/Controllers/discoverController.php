<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class discoverController extends Controller
{
    public function index(){
        return view('discover');
    }
}
