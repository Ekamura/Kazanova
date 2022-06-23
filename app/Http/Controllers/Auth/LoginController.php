<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginCheck(LoginRequest $request)
    {
        if (Auth::attempt(
            $request->only(['email', 'password']),
            $request->has('remembered'))
        ){
            $request->session()->regenerate();
            return redirect()->intended('profile');
        }

        return back()->withErrors([
            'errorLogin' => 'Ошибка входа..'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('welcome');
    }

    public function profile()
    {
        $orders = auth()->user()->orders()->latest()->get();

        return view('auth.profile',compact('orders'));
    }
}
