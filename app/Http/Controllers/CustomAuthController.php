<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login(): string
    {
        return view("auth.login");
    }

    public function register()
    {
        $users = array();
        $users = DB::table('users')->get();
        $users = json_decode($users, true);
        return view("auth.register", compact('users'));
    }

    public function registerUser(Request $request) {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required|email|unique:users',
            'login'=>'required|unique:users',
            'password'=>'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
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
                Session::put('loginId', $user->id);
                Session::put('role', $user->role);
                return redirect('/');
            } else {
                return back()->with('fail', 'Wrong password.');
            }
        } else {
            return back()->with('fail', 'User is not registered.');
        }
    }

    public function logoutUser(Request $request) {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
