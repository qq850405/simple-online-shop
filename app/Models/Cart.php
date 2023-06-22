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

    public function getBuyerCart()
    {
        return $this->query()
            ->join('products', 'products.id', '=', 'product_id')
            ->where('buyer_id', Auth::id())
            ->where('carts.deleted_at', '=', null)
            ->get();
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


    public function updateCartQuantity($product_id, $quantity)
    {
        return $this->query()
            ->where('buyer_id', Auth::id())
            ->where('product_id', $product_id)
            ->update(['quantity' => $quantity]);
    }

}
