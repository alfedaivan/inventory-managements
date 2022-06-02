<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

// controlles
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect('dashboard');
        }else{
            return view('index');
        }
    }

    public function actionLogin(Request $request){
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if(Auth::Attempt($data)){
            return redirect('/dashboard');
        }
        else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionLogout(){
        Auth::logout();
        return redirect('/');
    }

}
