<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function check()
    {
        $credentials = [
            'username' => request()->get('username'),
            'password' => request()->get('password'),
        ];

        $remember = request()->get('remember') === 'on';

        if(!Auth::attempt($credentials, $remember)){
            return redirect()->route('login')->withErrors(['username' => 'Username or password incorrect']);
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
