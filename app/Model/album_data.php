<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class album_data extends Model
{
    //
    protected $table = 'album_data';
 
 // The attributes that should be casted to native types.

 protected $casts = ['album_id' => 'integer',];
}
