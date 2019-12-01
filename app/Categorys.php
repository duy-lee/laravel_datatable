<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorys extends Model
{
    protected $table = 'categorys';

    protected $fillable = ['name_category','describe'];
    protected $dates = ['created_at','updated_at'];

    public function books(){
        return $this->hasMany('App\Books','category_id','id');
    }
}
