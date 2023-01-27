<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function showOrder()
    {
        $orderDetail  = new OrderProduct();
        return $orderDetail->order()
                    ->where('buyer_id',Auth::id())
                    ->get();
    }

    public function buyOrder()
    {
        $cart = new Cart();
        return $cart->getOrder()->get();
    }

    public function cancelOrder()
    {

    }
}
