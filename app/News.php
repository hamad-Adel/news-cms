<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // Starter path for image
    private $directory = '/storage/';

	protected $fillable = ['title', 'slug', 'image', 'category_id', 'user_id', 'content'];
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

    // Main image accessor
    public function getImageAttribute($value) {
     return $this->directory . $value;   
    }
}
