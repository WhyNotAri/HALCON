<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $fillable = [
        'costumer_number',
        'name',
        'rfc',
        'business_name',
        'fiscal_address',
        'postal_code'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
