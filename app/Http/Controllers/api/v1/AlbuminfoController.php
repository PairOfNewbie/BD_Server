<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\v1\BaseController;
use App\Http\Transformer\AlbumTransformer;
use App\Model\album_data;
use Dingo\Api\Http\Request;
use DB;

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
        $date = $request->all();
        //$onedayinfo = album_data::find($date);
        $onedayinfo = DB::table('album_data')->where('date', $date)->first();
        $test=json_encode($onedayinfo,JSON_UNESCAPED_SLASHES);
        return $test;//$this->response->item($onedayinfo, new AlbumTransformer);
    }

}
