<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  public function services()
  {
    return $this->belongsToMany('App\Service', 'Category_services')->orderBy('created_at','DESC')->paginate(6);
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
