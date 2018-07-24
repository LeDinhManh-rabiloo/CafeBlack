<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    public function order()
    {
    	return $this->hasMany('App\orders','id_product','id');
    }
}
