<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data['users']= User::where('role', 'customer')->get();
        return view('backend.admin.user.index',$data);
    }
}
