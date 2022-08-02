<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'product_name', 'product_price_rand'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
