<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Admins extends Authenticatable implements JWTSubject
{
    /**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
    'first_name', 'last_name', 'email', 'phone', 'role', 'picture', 'password',
    ];

/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
    'password', 'remember_token',
    ];

public function getJWTIdentifier()
    {
    return $this->getKey();
    }

public function getJWTCustomClaims()
    {
    return [];
    }

public function setPasswordAttribute($password)
    {
    if ( !empty($password) ) {
         $this->attributes['password'] = bcrypt($password); 
         }
    }

}
