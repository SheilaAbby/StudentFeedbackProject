<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $fillable=[
        'user_id','lect_id','unit_c','A','B','C'
    ];
}
