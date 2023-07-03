<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('member.auth.sign_in');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => "required|email",
            'password' => "required|min:6"
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'member';

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return to_route('member.dashboard');
        } 

        return back()->withErrors(['credentials' => 'Your credentials are wrong'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('member.login');
    }
}
