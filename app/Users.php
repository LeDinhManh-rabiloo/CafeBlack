<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    public function orders(){
    	return $this->hasMany('App\orders','id_user','id');
    }
    public function review()
    {
    	return $this->hasMany('App\review','id_user','id');
    }
    
}
