<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginCheck(LoginRequest $request)
    {

            return redirect()->route('admin.dashboard');


//        return back()->withErrors([
//            'email' => 'К сожалению ваша почта не найдена...'
//        ]);

    }



    public function dashboard()
    {

        $users = User::all()->count();
        $category = Category::all()->count();
        $orders = Order::all()->count();
        $products = Product::all()->count();
        return view('admin.dashboard', compact('users','category','orders','products'));
    }

    public function users()
    {
        return view('user.index');
    }
}



