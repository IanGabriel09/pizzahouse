<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'pizza_orders';

    protected $fillable = [
        'order_confirmation',
        'name',
        'address',
        'email',
        'contact',
        'pizza_type',
        'pizza_size',
        'crust_type',
        'toppings',
        'total_price',
        'delivery_driver'
    ];
}
