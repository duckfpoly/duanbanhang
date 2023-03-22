<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $fillable = [
        'id',
        'name_category',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $attributes = [
        'status'    => 0,
    ];
}
