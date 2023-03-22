<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Jenssegers\Mongodb\Eloquent\Model;

class Blog extends Model
{
    use HasApiTokens,HasFactory,Notifiable;
    protected $connection = 'mongodb';
    protected $fields = [
        'title_blog',
        'image_blog',
        'content_blog',
        'create_by',
        'updated_by',
    ];
}
