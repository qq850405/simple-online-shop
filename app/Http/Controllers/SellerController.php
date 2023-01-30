<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function showOrder(){
        $order = new Order();
        return $order->getSellerOrder()->get();
    }
    public function showOrderDetail($order_id){
        $order = new Order();
        return $order->getSellerOrderDetail($order_id);
    }
    public function deliver(){

    }
    public function cancelOrder(){

    }
}
