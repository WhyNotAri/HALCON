<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    
    protected $table = 'evidences'; 

    protected $fillable = [
        'order_id',
        'image_path',
        'type'
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}