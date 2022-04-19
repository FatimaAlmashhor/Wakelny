<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    public function listAll(){


    }

    public function showLogin(){
        if(Auth::check())
        return redirect()->route($this->checkRole());
        else
        return view('create_user');
    }



    public function checkRole(){

    }

    public function login(Request $request){
    }

    public function createUser(){

    }



    }

