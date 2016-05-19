<?php 
namespace App\Http\Controllers;

use Dingo\Api\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AdminauthController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    public function backend(Request $request)
    {
        // grab credentials from the request
//        $credentials = $request->only('name', 'password');
//$json_data=json_encode($credentials,JSON_UNESCAPED_SLASHES);
//echo $json_data;
User::insert([
	'name'=>'test1',
	'password'=>Hash::make('6821783');
	]);


$credentials = [
	'name' => 'test',
	'password' => '6821783'
	];
if (Auth::atempt($credentials)){
return 'yonghuchengongdenglu';
}
//echo $credentials[].'0';
//echo $credentials[1].'1';
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = $this->auth->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
echo 'token';
        // all good so return the token
        return response()->json(compact('token'));
	
    }
}
