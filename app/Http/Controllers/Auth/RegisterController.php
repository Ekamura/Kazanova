<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(RegisterRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return back()->withErrors([
                'errorRegister' => 'Пользователь с такими данными уже существует!'
            ]);
        }

        $user =  User::create([
            'name_user' => $request->get('name_user'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->password),
            'role_id' => '2'
        ]);


        if ($user) {
            Auth::login($user);
            return redirect()->route('profile');
        }

        return back()->withErrors([
            'errorRegister' => 'Что-то пошло не так..'
        ]);
    }


}
