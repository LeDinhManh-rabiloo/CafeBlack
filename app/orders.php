<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    public function users()
    {
    	return $this->belongsTo('App\Users','id_user','id');
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
