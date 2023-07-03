<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.layouts.auth.login');
    }

    public function autheticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'admin';

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('admin.movie');
        }

        return back()
                ->withErrors(['crendentials' => 'Your credentials are wrong'])
                ->withInput();

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('admin.login');
    }


}
