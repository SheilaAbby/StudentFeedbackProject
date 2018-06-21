<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{

    //
  protected $fillable=[
      'u_code','lect_id','presentation','subject_matter','personal_attributes','score'];
}
