<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $users = User::where('userType', 'Customer');
        return view('admin.users.index', compact('users'));
    }
    
    public function banUsers($id){
        $user = User::where($id, 'userId')->get();
        $user->delete();
        redirect(route('admin.users'));
    }
}
