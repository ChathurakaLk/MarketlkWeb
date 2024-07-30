<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthManager extends Controller
{
    //create function for login and Registration
    public function login (){
        return view('login');
    }

    public function registration (){
        return view('registration');
    }

    //post method

    function loginPost (Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){

            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "Login Details Not Valid");

    }
    function registrationPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $user=User::create($data);

        if(!$user){
            return redirect(route('registration'))->with("error", "Registration failed try again!");
        }
        return redirect(route('login'))->with("Success", "Registration Successfully");

    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
    function profile(){

        return redirect(route('profile'));
    }

}
