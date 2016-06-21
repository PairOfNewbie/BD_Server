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

    public function getonedayinfo(Request $request)
    {
        $date = $request->input('date');
        $dayinfo = album_data::where('date',$date)->get()->toArray();
        if ($dayinfo == '[]')
            $status = 0;
        else
            $status = 1;

        //return $this->response->item($dayinfo, new AlbumTransformer)->header('Success', $status);
        return \Response::json([
            'dayinfo'=>$dayinfo[0]
            ]);

    }
    
    public function fetch_album_detail(Request $request)
    {

        $albumid = $request->input('album_id');
        $albuminfo = album_data::where('album_id',$albumid)->get()->toArray();

        $commentinfo = comment_data::where('album_id',$albumid)->orderBy('created_at', 'desc')->get()->toArray();
        $zaninfo = zan_data::where('album_id',$albumid)->where('zan',1)->orderBy('updated_at', 'asc')->get()->toArray();


        return \Response::json([
            'zan'=>1,
            'albuminfo'=>$albuminfo[0],
            'commentlist'=>$commentinfo,
                'zanlist'=>$zaninfo
//            'commentlist'=>$this->transformCollection_comment($commentinfo),
//            'zanlist'=>$this->transformCollection_zan($zaninfo)
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