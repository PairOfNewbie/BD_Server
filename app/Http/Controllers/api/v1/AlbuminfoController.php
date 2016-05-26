<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\api\v1\BaseController;
use App\Http\Transformer\AlbumTransformer;
use App\Model\album_data;
use App\Model\zan_data;
use App\Model\comment_data;
use Dingo\Api\Http\Request;
use Dingo\Api\Http\Response;
use DB;
use Illuminate\Contracts\Support\Arrayable;
use stdClass;
use Illuminate\Support\Str;


class AlbuminfoController extends BaseController{



//    public function fetchdayinfolist(Request $request)
//    {
//        $date = $request->input('startdate');
//        $count = $request->input('count');
//
//        $dayinfo = album_data::where('date','<=',$date)->orderBy('date', 'desc')->take($count)->get();
//
//        return $this->response->item($dayinfo, new AlbumTransformer);//->withHeader('Status', 'success');
//
//
//    }

    public function fetchalbuminfolist(Request $request)
    {
        $albumid = $request->input('album_id');
        $albuminfo = album_data::where('album_id',$albumid)->get()->toArray();

        $commentinfo = comment_data::where('album_id',$albumid)->get()->toArray();
        $zaninfo = zan_data::where('album_id',$albumid)->get()->toArray();
        //$info = compact($albuminfo,$commentinfo,$zaninfo);
        //$this->response->item($albuminfo, new AlbumTransformer)
        $test1 = response($albuminfo)->header('test','stet');
        $test2 = response($commentinfo)->header('test','stet');
        return $test1;
//return response($albuminfo.$commentinfo.$zaninfo)->header('sus','ssss');
//return response($info)->withHeaders([
//        'X-Header-One' => 'Header Value',
//        'X-Header-Two' => 'Header Value',
//    ]);
//        return $this->response()
//            ->withHeader([
//                'X-Header-One' => 'Header Value',
//                'X-Header-Two' => 'Header Value',
//            ]);

    }
}
