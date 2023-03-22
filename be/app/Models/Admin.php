<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;

class Admin extends Eloquent implements AuthenticatableContract
{
    use Authenticatable,HasApiTokens, HasFactory, Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'admins';
    protected $guarded = 'admin';
    protected $fillable = [
        'email',
        'password',
        'status',
        'role',
    ];
    protected $hidden = [
        '_id','email','password','role'
    ];
}
