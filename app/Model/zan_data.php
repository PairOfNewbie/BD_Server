<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class zan_data extends Model
{
    //
    protected $table = 'zan_data';

 // The attributes that should be casted to native types.

 protected $casts = ['album_id' => 'integer', 'zan_id' => 'integer', 'user_id' => 'integer', ];
}
