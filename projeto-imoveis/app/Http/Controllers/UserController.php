<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /*public function auth(Request $request)
    {
        $data = $request->all();
        $remmenber = isset($data['lembrar']) ? true : false;

        if(Auth::attempt(['email' => $data['email'], 'password' => ['password']], $remmenber))
        {
            return redirect('/');
        } else
        {
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
    }*/
}
