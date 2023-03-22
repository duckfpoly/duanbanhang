<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;

class User extends Eloquent implements AuthenticatableContract
{
    use Authenticatable,HasApiTokens, HasFactory, Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'users';
    protected $guarded = 'user';
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'address',
    ];
    protected $hidden = [
        'password','status'
    ];
    protected $attributes = [
        'status'    => 0,
        'address'   => '',
        'phone'     => '',
    ];
}
