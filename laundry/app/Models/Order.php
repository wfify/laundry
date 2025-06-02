<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'service_id',
        'weight',
        'status',
        'item_type',
        'note',
        'transaction_time',
        'order_code',
        'price',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
