<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected $fillable = [
    'name', 'slug',
  ];
  public function services()
  {
    return $this->belongsToMany('App\Service', 'City_services')->paginate(6);
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
