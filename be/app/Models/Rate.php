<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $fillable = [
        'id_user',
        'id_product',
        'rate_star',
        'content',
        'rate_at',
    ];
}
