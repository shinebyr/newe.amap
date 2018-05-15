<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

  public function tags()
  {
    return $this->belongsToMany('App\Tag','Tag_services')->withTimestamps();
  }

  public function categories()
  {
    return $this->belongsToMany('App\Category','Category_services')->withTimestamps();
  }

  public function cities()
  {
    return $this->belongsToMany('App\City','City_services')->withTimestamps();
  }

  public function amenities()
  {
    return $this->belongsToMany('App\Amenity','Amenity_services')->withTimestamps();
  }

  public function pictures()
  {
    return $this->hasMany('App\ServiceImage');
  }

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }

  public function reviews()
  {
    return $this->hasMany('App\ServiceReview');
  }

  public function likes()
  {
    return $this->hasMany('App\Like');
  }



  public function getStarRating()
  {
    $count = $this->reviews()->count();
    if(empty($count)){
      return 0;
    }
    $starCountSum = $this->reviews()->sum('rating');
    $average = $starCountSum/ $count;
    return $average;
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
