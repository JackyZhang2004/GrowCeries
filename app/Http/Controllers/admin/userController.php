<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at', 'asc')->paginate(4);
        return view('admin.users.index', compact('users'));
    }
    
}
