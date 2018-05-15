<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    protected $fillable=['image_path', 'service_id'];

    public function service()
    {
      return $this->belongsTo('App\Service');
    }
}
