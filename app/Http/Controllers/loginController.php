<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class loginController extends Controller
{
    /**
     * 返回login视图,登录页面
     */
    public function loginGet()
    {
        return view('login');
    }

    /**
     * 登录响应
     */
    public function loginPost(Request $request)
    {
        $this->validate($request, User::rules());
        $id = $request->get('id');
        $password = $request->get('password');
        if (Auth::attempt(['id' => $id, 'password' => $password], $request->get('remember'))) {
            if (!Auth::user()->is_admin) {
                return Redirect::route('stu_home');
            } else {
                return Redirect::action('Admin\AdminController@index');
            }

        } else {
            return Redirect::route('login')
                ->withInput()
                ->withErrors('');
        }
    }

    /**
     * 用户登出
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return Redirect::route('login');
    }
}
