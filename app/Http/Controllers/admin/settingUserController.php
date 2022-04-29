<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class settingUserController extends Controller
{
     public function show(){
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index')->with('data', $users);
    }
}
