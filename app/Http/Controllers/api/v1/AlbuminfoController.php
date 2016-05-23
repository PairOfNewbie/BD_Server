<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\v1\BaseController;
use App\Http\Transformer\AlbumTransformer;
use App\Model\album_data;
use Dingo\Api\Http\Request;
use Dingo\Api\Http\Response;
use DB;
use Illuminate\Contracts\Support\Arrayable;
use stdClass;
use Illuminate\Support\Str;


class AlbuminfoController extends BaseController{
    //
    //return "success";
    public function index()
    {
        $albuminfo = album_data::all();
        return $this->response->collection($albuminfo,new AlbumTransformer);
    }


    public function getonedayinfo(Request $request)
    {
        $response = new Response('');
        $onedayinfo = album_data::all();
        //$onedayinfo = album_data::
        //$onedayinfo = DB::table('album_data')->where('date', $date)->first();
        //$test=json_encode($onedayinfo,JSON_UNESCAPED_SLASHES);
//        //return $test;//$this->response->item($onedayinfo, new AlbumTransformer);
//        return $this->response->item($onedayinfo->);//, new AlbumTransformer);
        //->header('status','success')
        //$test1 = response()->//->json($onedayinfo);//$this->response->item($info,new AlbumTransformer());
//        return response('body',200,$onedayinfo->toArray());//->header('status','success');
        $i=0;
        foreach ($onedayinfo as $dayinfo){
            $data_array[$i]=$dayinfo;
            $i++;
        }

        //$json_data=json_encode($data_array,JSON_UNESCAPED_SLASHES);
        return $response->header('status','success','test','yes')->json_encode($data_array);
        return response($data_array,200,['status'=>'success','test'=>'yes']);

    }

}
