<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/','TestController@index');
Route::get('/',function(){
//$results = DB::table('users')->where('id',1)->get();
$results = DB::table('users')
	->join('pages','users.id','=','pages.id')
	->select('users.*','pages.*')
	->get();
return json_encode($results);
});

Route::get('/about', function () {
    return 'about';
});


$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/hello/', function () {
        return "hello";
    });
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
