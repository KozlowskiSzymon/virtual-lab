<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function login(): string
    {
        return view("auth.login");
    }

    public function register(): string
    {
        return view("auth.register");
    }

    public function registerUser(Request $request) {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required|email|unique:users',
            'login'=>'required|unique:users',
            'password'=>'required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'User added.');
        } else {
            return back()->with('fail', 'Error occurred. User has not been added.');
        }
    }
    public function loginUser(Request $request) {
        $request->validate([
            'login'=>'required',
            'password'=>'required'
        ]);
        $user = User::query()->where('login', '=', $request->login)->first();
        if ($user){
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Wrong password.');
            }
        } else {
            return back()->with('fail', 'User is not registered.');
        }
    }

    public function dashboard() {
        return "Welcome!";
    }
}
