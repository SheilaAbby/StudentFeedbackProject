<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //user types and authentication
    const ADMIN_TYPE='admin';
    const DEFAULT_TYPE='student';

    public function isAdmin(){
        return  $this->type===self::ADMIN_TYPE;
    }

    protected $fillable = [
        'name', 'reg_no', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function students(){

        return $this->hasMany('App\Students');
    }
}
