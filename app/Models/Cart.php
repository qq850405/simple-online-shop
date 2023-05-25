<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = [
        'buyer_id',
        'product_id',
        'quantity',
        'status',
    ];

    public function getBuyerCart($seller_id)
    {
        return $this->query()
            ->join('products', 'products.id', '=', 'product_id')
            ->where('buyer_id', Auth::id())
            ->where('seller_id', $seller_id);
    }

    public function getCartTotal($seller_id)
    {
        return $this->query()
            ->Selectraw('price * quantity as subtotal')
            ->join('products', 'products.id', '=', 'product_id')
            ->where('buyer_id', Auth::id())
            ->where('seller_id', $seller_id)
            ->first();
    }

    public function updateCartSatuts($seller_id, $status)
    {
        return $this->query()
            ->join('products', 'products.id', '=', 'product_id')
            ->where('buyer_id', Auth::id())
            ->where('seller_id', $seller_id)
            ->update(['carts.status' => $status]);
    }


}
