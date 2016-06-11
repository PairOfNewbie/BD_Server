<?php

namespace App\Http\Controllers\api\v1;

use App\Model\Admin;
use App\Model\user_data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{
    //
    public function authenticate(Request $request)
    {
//        Admin::insert([
//            'name'=>'test1',
//            'password'=>Hash::make('1234'),
//        ]);
        // grab credentials from the request
        $credentials = $request->only('user_name', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function register(Request $request){
        $newUser =[
            'user_name'=>$request->get('name'),
            'password'=>bcrypt($request->get('password')),
        ];

        $user = user_data::create($newUser);
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }
}
