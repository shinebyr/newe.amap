<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'facebook', 'slug', 'gender', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];

    public function profile()
    {
      return $this->hasOne('App\Profile');
    }

    public function reviews()
    {
      return $this->hasMany('App\ServiceReview');
    }


    public function is_service()
    {
      if($this->service)
      {
        return true;
      }

        return false;
    }

}
