<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsSubImages extends Model
{
	protected $fillable = ['img', 'news_id'];
	
    public function news()
    {
    	return $this->belongsTo('App\News');
    }
}
