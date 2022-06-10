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

        Auth::attempt($request->only('email', 'password'));

        if(Auth::check()){
            $request->session()->put('name', Auth::user()->name);
            $request->session()->put('email', Auth::user()->email);

            return redirect()->route('dashboard');
        }else{
            return redirect()
            ->back()
            ->withErrors("Email Atau Password salah!");
        }

        var_dump(Auth::check());
            // Return command;

    }

    public function actionLogout(){
        Auth::logout();
        return redirect('/');
    }

}
