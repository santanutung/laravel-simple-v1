<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class LoginController extends Controller
{
    function LoginIndex()
    {
        return view('Login');
    }

    function onLogin(Request $request)
    {
        $username = $request->input('user');
        $password = $request->input('pass');
        $Result = Admin::where('username', '=', $username)->where('password', '=', $password)->count();
        if ($Result == 1) {
            $request->session()->put('user', $username);
            return 1;
        } else {
            return 0;
        }
    }

    function Logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
