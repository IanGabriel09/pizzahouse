<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDriver extends Model
{
    use HasFactory;

    protected $table = 'delivery_drivers';

    protected $fillable = [
        'name',
        'contact',
        'email',
    ];
}
