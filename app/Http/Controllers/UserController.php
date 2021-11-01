<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function profile() {
        $items = Item::query()->with('users')->get();
        $items = json_decode($items, true);
        $myItems = array();
        foreach ($items as $item) {
            foreach ($item['users'] as $user) {
                if ($user['id'] == Session::get('loginId')) {
                    array_push($myItems, $item);
                }
            }
        }
        $items = $myItems;
        return view("profile", compact('items'));
    }

    public function saveUser(Request $request) {
        if ($request -> id) {
            $request->validate([
                'name'=>'required',
                'surname'=>'required',
                'email'=>'required|email',
                'login'=>'required',
            ]);
            $user = User::query()->where('id', '=', $request->id)->first();
            $res = $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'login' => $request->login,
                'role' => $request->role,
            ]);
            if ($request->password) {
                $user->update(['password' => Hash::make($request->password)]);
            }
            $users = DB::table('users')->get();
            $users = json_decode($users, true);
            $toEdit = null;
            if ($res) {
                return view("auth.register", compact('toEdit', 'users'))->with('success', 'User updated.');
            } else {
                return view("auth.register", compact('toEdit', 'users'))->with('fail', 'Error occurred. User has not been updated.');
            }
        } else {
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
            $users = DB::table('users')->get();
            $users = json_decode($users, true);
            $toEdit = null;
            if ($res) {
                return view("auth.register", compact('toEdit', 'users'))->with('success', 'User added.');
            } else {
                return view("auth.register", compact('toEdit', 'users'))->with('fail', 'Error occurred. User has not been added.');
            }
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
        $users = DB::table('users')->get();
        $users = json_decode($users, true);
        $toEdit = User::query()->where('id', '=', $request->id)->first();
        return view("auth.register", compact('toEdit', 'users'));
    }
}
