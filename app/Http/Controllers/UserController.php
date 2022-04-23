<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    function index()
    {
        $seeker =  User::join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('role_user.role_id', 3)

            ->get();
        // print_r($seeker);
        // return response()->json($seeker);;
        return view('client.user.freelancers')->with('data', $seeker);
    }
}