<?php

namespace App\Http\Controllers\api\v1;

//use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades;
//use Dingo\Api\Http\Request;
//use Tymon\JWTAuth\JWTAuth;
//use Tymon\JWTAuth\Exceptions\JWTException;
//use app\User;
use App\Http\Controllers\Controller;
use App\Model\album_data;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class AlbumController extends Controller
{

    public function index()
    {
        $album_data = album_data::all();
        //$json = file_get_contents("php://input");
        //$oneday = json_decode($json, true);
        //$dayinfo = album_data::findOrFail($date);
        return \Response::json([
            'status'=>'success',
            'status_code'=>200,
            'data'=>$this->transformCollection($album_data)
        ]);
    }

    public function testinfo(Request $request)
    {
        //$album_data = album_data::all();
        //$json = file_get_contents("php://input");
        //$oneday = json_decode($json, true);
        //$dayinfo = album_data::findOrFail($date);
        $json = file_get_contents("php://input");
        $arr = json_decode($json, true);
        $date = $arr['date'];

        $info = DB::table('album_data')->where('date', $date)->first();
//        $testinfo = json_decode($onedayinfo, true);
        $i=0;
        foreach ($info as $day){
            $data_array[$i]=$day;
            $i++;
        }
        return \Response::json([
            'status'=>'success',
            'status_code'=>200,
            'data'=>$this->transformCollection($data_array)
        ]);
    }

    private function transformCollection($dayinfo)
    {
        return array_map([$this,'transform'],$dayinfo);//->toArray());
    }

    private function transform($dayinfo)
    {
        return[
            'date'=>$dayinfo['date'],
            'text'=>$dayinfo['text'],
            'img_url'=>$dayinfo['img_url']
        ];
    }
}