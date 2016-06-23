<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class comment_data extends Model
{
    //
    protected $table = 'comment_data';

 // The attributes that should be casted to native types.

 protected $casts = ['album_id' => 'integer','comment_id' => 'integer', 'user_id' =>'integer',];
}
