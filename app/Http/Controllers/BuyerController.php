<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class BuyerController extends Controller
{
    public function showOrder()
    {
        $orderDetail = new OrderProduct();
        return $orderDetail->order()
            ->where('buyer_id', Auth::id())
            ->get();
    }

    public function buyOrder(Request $request)
    {
        try {
            $cart = new Cart();
            $data = $request->validate([
                'seller_id' => ['required', 'integer'],
                'billing_email' => ['required', 'string','email'],
                'billing_name' => ['required', 'string'],
                'billing_address' => ['required', 'string'],
                'billing_city' => ['required', 'string'],
                'billing_phone' => ['required', 'string'],
                'billing_name_on_card' => ['required', 'string'],
                'payment_gateway' => ['required', 'string'],
                'error' => ['string'],
            ]);
            $sellerId = $data['seller_id'];
            if (!$cart->getBuyerCart($sellerId)->exists()) {
                throw new Exception('');
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'The given data was invalid.']);
        }

        DB::beginTransaction();
        try {
            $carts = $cart->getBuyerCart($sellerId)->get();
            $order = new Order;
            $order->buyer_id = Auth::id();
            $order->billing_email = $data['billing_email'];
            $order->billing_name = $data['billing_name'];
            $order->billing_address = $data['billing_address'];
            $order->billing_city = $data['billing_city'];
            $order->billing_phone = $data['billing_phone'];
            $order->billing_name_on_card = $data['billing_name_on_card'];
            $order->billing_total = $cart->getCartTotal($sellerId)->subtotal;
            $order->payment_gateway = $data['payment_gateway'];
            $order->error = $data['error'];
            $order->save();

            foreach ($carts as $cart) {

                $op = new OrderProduct;
                $op->order_id = $order->id;
                $op->product_id = $cart->product_id;
                $op->quantity = $cart->quantity;
                $op->save();

                $product = new Product;
                $product->deductInventory($cart->product_id,$cart->quantity);
                $product->update();

                $cart->updateCartSatuts($sellerId,'bought');
                $cart->delete();
            }

            DB::commit();
            return response(['message' => 'ALL GOOD'], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response(['message' => $e], 500);
        }
//        return $cart->getBuyerCart()->get();
    }

    public function cancelOrder()
    {

    }
}
