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
    public function category()
    {
    	return $this->belongsTo('App\category','id_category','id');
    }
    public function sale()
    {
    	return $this->belongsTo('App\sale','id_sale','id');
    }
    public function review()
    {
        return $this->hasMany('App\review','id_product','id');
    }
}
