<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyCountry extends Model {
    use HasFactory;

    protected $fillable = [
        'currency_name', 'currency_sign', 'country_name', 'exchange_rate'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
