<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('login', 'authenticate');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $input = request()->only(['email', 'password']);
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($input)) {
            $request->session()->regenerate();
            if (Auth::user()->roles == 'SUPER ADMIN') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login');
            }
        } else {
            return back()->with([
                'error' => 'gagal login'
            ]);
        }

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/');
    }
}


