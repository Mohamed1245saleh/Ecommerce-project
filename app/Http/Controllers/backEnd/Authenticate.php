<?php

namespace App\Http\Controllers\backEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class Authenticate extends Controller
{
    public function __construct(){
        $this->middleware("revalidate");
    }

    public function logout(){
        session()->forget("user_token");
        session()->flush();
        return redirect()->route("login");
    }

    public function forgotPassword(){
        return view("Auth.forgot");
    }

    public function login(Request $request){
       if(session()->has("user_token")){
           return redirect()->route("users.index");
       }
       return view("Auth.login");
    }

    public function postLogin(Request $request){

        return redirect()->route("users.index");

    }


}
