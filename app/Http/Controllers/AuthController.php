<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login1');
    }

    

    public function register()
    {
        return view('register1');
    }

    public function confirmation()
    {
        return view('confirmation');
    }

    public function postlogin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return Redirect::to("login1")->withSuccess('Invalid Credentials');
    }

    public function postRegister(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'homeaddress' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return Redirect::to("confirmation")->withSuccess("Success");
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return Redirect::to("login1")->withSuccess('You do not have access');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'homeaddress' => $data['homeaddress'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('login1');
    }
}
