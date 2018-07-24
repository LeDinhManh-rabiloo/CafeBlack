<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    public function Customer()
    {
    	return $this->belongsTo('App\Customer','id_customer','id');
    }
    public function product()
    {
    	return $this->belongsTo('App\product','id_product','id');
    }
    public function status()
    {
    	return $this->belongsTo('App\status','id_status','id');
    }
}
