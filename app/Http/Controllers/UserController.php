<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function profile() {
        return view("profile");
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

    public function changePassword(Request $request) {
        $res = User::query()->where('id', '=', Session::get('loginId'))->update(['password' => Hash::make($request->password)]);
        if ($res) {
            return back()->with('success', 'Password changed.');
        } else {
            return back()->with('fail', 'Error occurred.');
        }
    }

    public function removeUser(Request $request) {
        $user = User::query()->where('id', '=', $request->id)->first();
        $user->items()->detach();
        $user->delete();
        $authController = new CustomAuthController();
        return $authController->register();
    }

    public function editUser(Request $request) {

    }
}
