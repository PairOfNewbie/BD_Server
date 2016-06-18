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

Route::get('/','TestController@index');
Route::post('api/albumdetail','api\v1\AlbumController@fetch_album_detail');
Route::post('api/oneday','api\v1\AlbumController@getonedayinfo');

Route::post('api/zan','api\v1\ZanController@zan');


Route::post('api/commentlist','api\v1\CommentController@fetch_comment_list');


Route::get('/api/upload/login','api\v1\upload\LoginController@login');




//Route::get('/',function(){
//$results = DB::table('users')->where('id',1)->get();
//$results = DB::table('users')
//	->join('pages','users.id','=','pages.id')
//	->select('users.*','pages.*')
//	->get();
//return json_encode($results);
//});

Route::get('/about', function () {
    return 'about';
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api){
    $api->group(['namespace' =>'App\Http\Controllers\api\v1'],function($api){
        $api->post('login','AuthController@authenticate');

        //$api->post('oneday','AlbuminfoController@getonedayinfo');

        $api->post('daylist','AlbuminfoController@fetchdayinfolist');

        $api->post('albuminfo','AlbuminfoController@fetchalbuminfolist');
        $api->post('register','AuthController@register');

        

        $api->group(['middleware' => 'jwt.auth'],function($api){
        Route::post('api/comment','api\v1\CommentController@comment');
        });
    });
});


Route::group(['prefix'=>'api/v2'],function(){
   Route::resource('album_data','api\v1\AlbumController');
});
//
//$api = app('Dingo\Api\Routing\Router');
//$api->version('v1', function ($api) {
//    $api->get('/hello', function () {
//        return "hello";
//    });
//});
//
//
//// Publicly accessible routes
//$api->version('v1', [], function ($api) {
//    $api->post('/adminauth', 'App\Http\Controllers\AdminauthController@backend');
//});

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
