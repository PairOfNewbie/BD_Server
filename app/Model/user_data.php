<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class user_data extends Model
{
    //
    protected $table = 'user_data';
    protected $fillable = [
        'uid','user_name', 'password',
    ];

    protected $primaryKey = 'user_id';
 // The attributes that should be casted to native types.

 protected $casts = ['user_id' => 'integer',];
}
