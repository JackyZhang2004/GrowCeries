<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    
    public function banUsers($id){
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect(route('admin.users'))->with('success', 'User banned');
    }
}
