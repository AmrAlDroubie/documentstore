<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        if (Auth::attempt(['name' => $username, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->intended('add');
        }

        return view("login", ['msg' => 'هناك خطا في اسم المستخدم او كلمة المرور']);
    }

    public function check()
    {
        if (Auth::check()) {
            return redirect()->intended('add');
        }
        return view('login');
    }

    public function profile()
    {
        $user_info = DB::table('users')->select(['name', 'id'])->where('id', '=', Auth::id())->first();
        $docs = DB::table('documents')->where('user_id', '=', $user_info->id)->get();

        return view('profile', ['user_info' => $user_info, 'docs' => $docs]);
    }
}
