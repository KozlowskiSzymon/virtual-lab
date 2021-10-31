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
