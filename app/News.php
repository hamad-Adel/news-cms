<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

	protected $fillable = ['title', 'main_img', 'category_id', 'user_id', 'content'];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function user()
    {
        return $this->belongsTo('App\user');
    }

     public function subImages()
    {
        return $this->hasMany('App\NewsSubImages');
    }
}
