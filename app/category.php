<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    public function product()
    {
    	return $this->hasMany('App\product','id_category','id');
    }
    public function fontsicons()
    {
    	return $this->belongsTo('App\fontsicons','id_icons','id');
    }
}
