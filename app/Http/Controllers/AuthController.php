<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginuser(Request $request)
    {
        $user = User::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->first();

        if ($user) {
            session()->put('id', $user->id);
            session()->put('type', $user->type);

            if ($user->type == 'admin') {
                // return redirect()->route('index');
                return redirect('/ourcstform');  // Direct URL

            } else {
                return redirect('/');
            }
        } else {
            return redirect('/')->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        session()->forget(['id', 'type']);
        return redirect('/');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
