<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table = 'status';
    public function orders()
    {
    	return $this->hasMany('App\orders','id_status','id');
    }
}
