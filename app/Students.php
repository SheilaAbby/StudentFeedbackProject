<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    protected $fillable=['name','reg_number',
    'c_code','year','semester'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
