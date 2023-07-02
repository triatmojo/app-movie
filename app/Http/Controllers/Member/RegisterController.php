<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('member.auth.sign_up');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|numeric|min:11',
            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);

        $data = $request->except('_token');

        $isEmailExists = User::where('email', $request->email)->exists();

        if($isEmailExists) {
            return back()->withErrors('email', 'This email is already exist')->withInput();
        }

        $data['role'] = 'member';
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return to_route('member.login');
    }
}
