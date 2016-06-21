<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Model\album_data;
use App\Model\zan_data;
use App\Model\comment_data;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades;

class ZanController extends Controller
{
    //
    public function zan (Request $request)
    {
        $albumid = $request->input('album_id');
        $userid = $request->input('user_id');
        $zan_info = $request->input('zan');

        //$zan_status = DB::table('zan_data')->where('user_id', $userid)->where('album_id',$albumid)->value('zan');
        $username = DB::table('zan_data')->where('user_id', $userid)->where('album_id',$albumid)->value('user_name');

        //return $results;
        //'updated_at'=>$dayinfo['updated_at'],
//return $zan_status;
        if (empty($username)) {
            $zan_table = new zan_data();
            $zan_table->zan = $request->zan;
            $zan_table->album_id = $request->album_id;
            $zan_table->user_id = $request->user_id;

            $name = DB::table('user_data')->where('user_id', $userid)->value('user_name');
            $zan_table->user_name = $name;
            $zan_table->save();
            $zaninfo = zan_data::where('album_id',$albumid)->where('user_id',$userid)->get()->toArray();
        }
        else{
                zan_data::where('album_id', $albumid)
                    ->where('user_id', $userid)
                    ->update(['zan' => $zan_info]);

            $zaninfo = zan_data::where('album_id',$albumid)->where('user_id',$userid)->get()->toArray();
        }

	//$return_zaninfo = $this->transformCollection_zan($zaninfo);
//        $return_zaninfo = comment_data::where('album_id',$albumid)->where('user_id',$userid)
//            ->get()->toArray();


        return \Response::json([
            //'zaninfo'=>$this->transformCollection_zan($zaninfo)
	    'success'=>'1',
	    'zaninfo'=>$zaninfo[0],
        ]);

    }

    private function transformCollection_zan($dayinfo)
    {
        return array_map([$this,'transform_zan'],$dayinfo);
    }

    private function transform_zan($dayinfo)
    {
        return[
            'zan'=>$dayinfo['zan'],
            'updated_at'=>$dayinfo['updated_at'],
        ];
    }

}
