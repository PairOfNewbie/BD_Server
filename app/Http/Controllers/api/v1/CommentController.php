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

class CommentController extends Controller
{
    //
    public function comment (Request $request)
    {
        $albumid = $request->input('album_id');
        $userid = $request->input('user_id');
        $content = $request->input('content');


        $comment_table = new comment_data();
        $comment_table->content = $content;
        $comment_table->album_id = $albumid;
        $comment_table->user_id = $userid;

        $name = DB::table('user_data')->where('user_id', $userid)->value('user_name');
        $comment_table->user_name = $name;
        $comment_table->save();

        $thiscomment = comment_data::where('album_id',$albumid)->where('user_id',$userid)
            ->orderBy('created_at', 'desc')->get()->toArray();
        return \Response::json([
            'Success'=>1,
            'comment'=>$thiscomment[0],
        ]);


    }
    


}

