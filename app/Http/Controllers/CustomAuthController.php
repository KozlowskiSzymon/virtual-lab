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
        $users = DB::table('users')->get();
        $users = json_decode($users, true);
        $toEdit = null;
        return view("auth.register", compact('toEdit', 'users'));
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
