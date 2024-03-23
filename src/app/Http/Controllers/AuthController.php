<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function create(){
    return view('auth.register');
    }

    public function register(AuthRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            Auth::login($user);
            return redirect('/login');
        } else {
            return redirect('/register');
        }
    }

    public function showLoginForm(){
    return view('auth.login');
    }

    public function login(AuthRequest $request){
        $item = $request->only('email', 'password');
        if (Auth::attempt($item)) {
          return redirect('/admin');
        } else {
          return redirect ('/login')->with('message', 'メールアドレスまたはパスワードが正しくありません。');
        }
    }

    // public function admin(){
    //     return view('admin');
    // }
}