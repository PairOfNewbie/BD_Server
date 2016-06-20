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

        // grab credentials from the request
        $credentials = $request->only('uid', 'password');

	$uid = $request->get('uid');        
	$userdatas = user_data::where('uid',$uid)->get();
        if($userdatas == '[]'){
            return \Response::json([
                'status'=>'unregister'
            ]);
        }
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status' => 'wrong_password'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['status' => 'could_not_create_token'], 500);
        }
        $user_id = $userdatas[0]->user_id;//get current user_id
        $user_name = $userdatas[0]->user_name;//get current user_id
	// all good so return the token
        //return response()->json(compact('token'));
        return \Response::json([
            'status'=>'success',
            'user_id'=>$user_id,
	    'user_name'=>$user_name,
            'token'=>$token,
        ]);
    }

    public function register(Request $request){


        $newUser =[
            'uid'=>$request->get('uid'),
            'user_name'=>$request->get('user_name'),
            'password'=>bcrypt($request->get('password')),
        ];
        $uid = $request->get('uid');
        $db_uid = user_data::where('uid',$uid)->get();//check uid is occupied or not
        if($db_uid != '[]'){
            return \Response::json([
                'status'=>'occupied'
            ]);
        }

        $user = user_data::create($newUser);//save to database

        $userdatas = user_data::where('uid',$uid)->get();
        $user_id = $userdatas[0]->user_id;//get current user_id

        $token = JWTAuth::fromUser($user);
        //return response()->json(compact('token'));
        return \Response::json([
            'status'=>'success',
            'user_id'=>$user_id,
            'token'=>$token,
        ]);
    }

}
