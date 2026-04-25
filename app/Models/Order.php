<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'invoice_number',
        'customer_id',
        'status',
        'order_date',
        'delivery_address',
        'notes'
    ];

    public function costumer() {
        return $this->belongsTo(Costumer::class);
    }
    
    public function evidences() {
        return $this->hasMany(Evidence::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
