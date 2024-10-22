<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function handlelogin(LoginRequest $request){

        return $request;
        // $email = $request->input('email');
        // $password = $request->input('password');

    }
}
