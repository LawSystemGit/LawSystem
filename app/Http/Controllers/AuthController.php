<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect, Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return view('user.login');
        } else {
            return redirect()->route('getLaws');
        }
    }

    public function registration()
    {
        if (!Auth::check()) {
            return view('user.registration');
        } else {
            return redirect()->route('getLaws');
        }
    }

    public function postLogin(Request $request)
    {

        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request['remember'])) {
            // Authentication passed...
            // Auth::logoutOtherDevices($request['password']);
            return redirect()->route('getLaws');
        }
        return Redirect()->route("login");

    }

    public function postRegistration(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        if ($check) {
            return redirect()->route('getLaws');
        }
        return redirect()->back();
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        if (Auth::check()) {
            Session::flush();
            Auth::logout();
            return Redirect('login');
        } else {
            return Redirect('login');
        }
    }
}
