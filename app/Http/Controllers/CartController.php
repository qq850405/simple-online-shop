<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{

    public function showCart()
    {
        $cart = Cart::query()
        ->where('buyer_id',Auth::id())
        ->where('deleted_at',NULL);

        if(!$cart->exists()){
            return response()->json(['status' => 'No item in cart.']);
        }else{
            return $cart->get();
        }
    }


    public function addCart(Request $request)
    {
        try{
            $data = $request->validate([
                'product_id' =>
                    ['required','Integer',Rule::exists('products', 'id')->where('status','open')
                            ->where('deleted_at',null)],
                'quantity' => ['required','Integer','min:1']
            ]);
        }catch (ValidationException $e){
            return response('The given data was invalid.', 400);
        }
        if(Cart::query()
            ->where('buyer_id',Auth::id())
            ->where('product_id',$data['product_id'])
            ->exists()) {

            Cart::query()
                ->where('buyer_id',Auth::id())
                ->where('product_id',$data['product_id'])
                ->increment('quantity' ,$data['quantity']);

        }else{
            Cart::query()
                ->create([
                    'buyer_id' => Auth::id(),
                    'product_id' => $data['product_id'],
                    'quantity' => $data['quantity']
                ]);
        }
        return response()->json(['status' => 'Add item in cart succeed.']);
    }

    public function deleteCart(Request $request)
    {
        try {
            $data = $request->validate([
                'product_id' =>
                    ['required', 'Integer', Rule::exists('carts', 'product_id')
                        ->where('deleted_at', null)
                        ->where('buyer_id', Auth::id())],
                'quantity' => ['required', 'Integer', 'min:1']
            ]);

        }catch (ValidationException $e){
            return response('The given data was invalid.', 400);
        }
        $cart = Cart::query()
            ->where('buyer_id',Auth::id())
            ->where('product_id',$data['product_id']);

        $quantity = $cart->first()->quantity;

        if($quantity < $data['quantity']){
            return response()->json(['status' => '\Delete item from cart failed.']);
        }elseif($quantity > $data['quantity']){
            $cart->decrement('quantity',$data['quantity']);
            return response()->json(['status' => 'Update item from cart succeed.']);
        }else{
            $cart->update(['status'=> 'delete']);
            $cart->delete();
            return response()->json(['status' => '\Delete item from cart succeed.']);
        }
    }
}
