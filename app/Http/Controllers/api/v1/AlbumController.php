<?php

namespace App\Http\Controllers\api\v1;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades;
//use Dingo\Api\Http\Request;
//use Tymon\JWTAuth\JWTAuth;
//use Tymon\JWTAuth\Exceptions\JWTException;
//use app\User;
use App\Http\Controllers\Controller;
use App\Model\album_data;

class AlbumController extends Controller
{

    public function Getonedayinfo($date)
    {
        return album_data::all();
        //$json = file_get_contents("php://input");
        //$oneday = json_decode($json, true);
        $dayinfo = album_data::findOrFail($date);
        return \Response::json([
            'status'=>'success',
            'data'=>$this->transformCollection($dayinfo)
        ]);
    }

    private function transformCollection($dayinfo)
    {
        return array_map([$this,'transform'],$dayinfo->toArray());
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