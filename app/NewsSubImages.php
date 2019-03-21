<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsSubImages extends Model
{
	private $directory = '/storage/';
	protected $fillable = ['img', 'news_id'];
	
    public function news()
    {
    	return $this->belongsTo('App\News');
    }

    public function getImgAttribute($value)
    {
    	return $this->directory . $value;
    }
}
