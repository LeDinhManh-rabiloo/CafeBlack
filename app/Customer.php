<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public function orders()
    {
    	return $this->hasMany('App\orders','id_customer','id');
    }
}
