<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'user_id'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function news()
    {
        return $this->hasMany('App\News');
    }
}
