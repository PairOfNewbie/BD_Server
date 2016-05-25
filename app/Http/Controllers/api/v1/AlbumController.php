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
use App\Model\zan_data;
use App\Model\comment_data;use Illuminate\Http\Request;
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

        $albumid = $request->input('album_id');
        $albuminfo = album_data::where('album_id',$albumid)->get()->toArray();

        $commentinfo = comment_data::where('album_id',$albumid)->get()->toArray();
        $zaninfo = zan_data::where('album_id',$albumid)->get()->toArray();
        return \Response::json([
            'zan'=>1,
            'albuminfo'=>$albuminfo[0],
            'commentlist'=>$this->transformCollection_comment($commentinfo),
            'zanlist'=>$this->transformCollection_zan($zaninfo)
        ]);
    }

    private function transformCollection_comment($dayinfo)
    {
        return array_map([$this,'transform_comment'],$dayinfo);
    }

    private function transformCollection_zan($dayinfo)
    {
        return array_map([$this,'transform_zan'],$dayinfo);
    }

//    private function transform_album($dayinfo)
//    {
//        return[
//            'album_id'=>$dayinfo['album_id'],
//            'date'=>$dayinfo['date'],
//            'text'=>$dayinfo['text'],
//            'img_url'=>$dayinfo['img_url'],
//            'music_url'=>$dayinfo['music_url'],
//            'page_url'=>$dayinfo['page_url']
//        ];
//    }

    private function transform_comment($dayinfo)
    {
        return[
            'album_id'=>$dayinfo['album_id'],
            'content'=>$dayinfo['content'],
            'user_id'=>$dayinfo['user_id']
        ];
    }


    private function transform_zan($dayinfo)
    {
        return[
            'user_name'=>$dayinfo['user_name'],
        ];
    }
}