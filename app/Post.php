<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  public function getRouteKeyName()
  {
    return 'slug';
  }

  protected $dates = [
    'created_at'
  ];

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }
}
