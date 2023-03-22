<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    use HasApiTokens,HasFactory,Notifiable;
    protected $connection = 'mongodb';
    protected $fillable = [
        'name_product',
        'image_product',
        'image_product_2',
        'image_product_3',
        'price_product',
        'desc_sort',
        'desc',
        'created_by',
        'updated_by',
        'status',
        'created_at',
        'updated_at',
        'id_category',
    ];
}
