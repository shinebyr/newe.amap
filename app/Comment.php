<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
      'comment'
  ];

  public function service()
  {
      $this->belongsTo('App\Service');
  }
}
