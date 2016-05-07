<?php
/**
 * Created by PhpStorm.
 * User: qinxiang
 * Date: 16/5/7
 * Time: 下午3:34
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;

class AlbuminfoController extends Controller
{
    /**
     * 返回login视图,登录页面
     */
    public function AlbuminfoGet()
    {
        return 1;
    }

    /**
     * 登录响应
     */
    public function AlbuminfoPost(Request $request)
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
