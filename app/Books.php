<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $table = 'books';

    protected $fillable = ['name_book','category_id','author','quantity','describe'];
    protected $dates = ['created_at','updated_at'];

    public function categorys(){
        return $this->belongsTo('App\Categorys','category_id','id');
    }
}
