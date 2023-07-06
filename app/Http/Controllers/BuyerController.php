<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Phattarachai\LineNotify\Facade\Line;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use function Sodium\add;

class BuyerController extends Controller
{
    public function showOrder()
    {
        $order = new Order();
        return $order->getBuyerOrder();
    }

    public function showOrderDetail(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'array'],
            'quantity' => ['required', 'array'],
            'extra' => ['required', 'array'],
            'spice_level' => ['required', 'array'],
        ]);


        $products = new Product();
        $detail = [];
        $detail['total'] = 0;
        $detail['tax'] = 0;
        $cart = new Cart();
        $cart->getBuyerCart();
        $index = 0;
        for ($i = 0; $i < count($data['product_id']); $i++) {
            $cart->updateCartQuantity($data['product_id'][$i], $data['quantity'][$i]);
            $product = $products->getProductById($data['product_id'][$i]);
            $detail[$i]['product_id'] = $product->id;
            $detail[$i]['name'] = $product->name;
            $detail[$i]['price'] = $product->price;
            $detail[$i]['quantity'] = $data['quantity'][$i];
            $detail[$i]['subtotal'] = $product->price * $data['quantity'][$i];
            if($product->add_to == 'on'){
                $detail[$i]['extra'] = $data['extra'][$index];
                if($detail[$i]['extra']  == 'beef'){
                    $detail[$i]['subtotal'] += 2;
                }
                if($detail[$i]['extra']  == 'shrimp'){
                    $detail[$i]['subtotal'] += 3;
                }
                if($detail[$i]['extra']  == 'seafood'){
                    $detail[$i]['subtotal'] += 5;
                }
                $detail[$i]['spice_level'] = $data['spice_level'][$index];
                $index++;
            }
            $detail['total'] += $detail[$i]['subtotal'];
            if ($product->id != 0) {
                $detail['tax'] += $detail[$i]['subtotal'] * 0.06;
            }
        }

        $detail['total'] += $detail['tax'];
        return view('payment', compact('detail'));
    }

    public function buyOrder(Request $request)
    {
        try {
            $cart = new Cart();
            $data = $request->validate([
                'email' => ['required', 'string', 'email'],
                'name' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'total' => ['required', 'numeric'],
                'line1' => ['required', 'string'],
                'postal_code' => ['required', 'string'],
                'city' => ['required', 'string'],
                'state' => ['required', 'string'],
                'country' => ['required', 'string'],
                'extra' => ['array'],
                'spice_level' => ['array'],

            ]);
        } catch (Exception $e) {
            return $e->getMessage();
            return response()->json(['status' => 'The given data was invalid.']);
        }

        DB::beginTransaction();
        try {
            $order = new Order;
            $order->buyer_id = Auth::id();
            $order->billing_email = $data['email'];
            $order->billing_name = $data['name'];
            $order->billing_address = $data['postal_code'] . $data['line1'] . $data['city'] . $data['state'] . $data['country'];
            $order->billing_city = $data['city'];
            $order->billing_phone = $data['phone'];
            $order->billing_total = $data['total'];
            $order->save();
            $message = "You have a new order";
            $carts = $cart->getBuyerCart();
            foreach ($carts as $cart) {
                $product = new Product;
                $flag  = $product->getProductById($cart->product_id)->add_to == "on";
                $index = 0;

                $op = new OrderProduct;
                $op->order_id = $order->id;
                $op->product_id = $cart->product_id;
                $op->quantity = $cart->quantity;

                if($flag){
                    $op->add_to = $data['extra'][$index] . " and " . $data['spice_level'][$index];
                }
                $op->save();


                $product->deductInventory($cart->product_id, $cart->quantity);
                $name = $product->getProductById($cart->product_id)->name;

                if($flag){
                    $message .= "\n" . $name . " x " . $cart->quantity . " with " . $data['extra'][$index] . " and " . $data['spice_level'][$index];
                    $index++;
                }else{
                    $message .= "\n" . $name . " x " . $cart->quantity;
                }

                $product->update();
                $cart->delete();
            }

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $customer = Customer::create(array(
                "address" => [
                    "line1" => $data['line1'],
                    "postal_code" => $data['postal_code'],
                    "city" => $data['city'],
                    "state" => $data['state'],
                    "country" => $data['country'],
                ],
                "email" => $data['email'],
                "name" => $data['name'],
                "source" => $request->stripeToken
            ));

            Charge::create([
                "amount" => $data['total'] * 100,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Stripe from www.sampannee.com",
                "shipping" => [
                    "name" => $data['name'],
                    "address" => [
                        "line1" => $data['line1'],
                        "postal_code" => $data['postal_code'],
                        "city" => $data['city'],
                        "state" => $data['state'],
                        "country" => $data['country'],
                    ]
                ]
            ]);
            Session::flash('success', 'Payment successful!');
            Cart::where('buyer_id', Auth::id())->delete();
            DB::commit();
            Line::send($message);
            return redirect()->route('index');
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->route('cart.show');
        }
    }

    public function orderHistory(){
        $orders = Order::where('buyer_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('history', compact('orders'));
    }

}
