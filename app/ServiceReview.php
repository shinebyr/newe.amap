<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceReview extends Model
{
    protected $fillable=[
      'headline',
      'description',
      'rating',
      'service_id'
    ];

}
