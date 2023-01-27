<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'buyer_id',
        'billing_email',
        'billing_name',
        'billing_address',
        'billing_city',
        'billing_phone',
        'billing_name_on_card',
        'billing_total',
        'payment_gateway',
        'error',
    ];

    public  function orderProduct(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }


}
