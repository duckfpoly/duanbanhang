<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $fillable = [
        'order_code',
        'order_date',
        'pay_method',
        'pay_status',
        'id_user',
        'id_product',
        'price_product',
        'quantity',
        'toping',
        'status',
    ];
}
