<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'product_name', 'product_price_rand', 'order_price', 'quantity', 'order_paid_date', 'image'
    ];
}
