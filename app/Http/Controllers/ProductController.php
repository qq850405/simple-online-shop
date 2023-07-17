<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
            $products = new Product();
            $category = $products->getProductCategory(1);
            $menu = $products->getProduct();
        return view('menu',compact('category','menu'));
    }

    public function shop(){
        $products = new Product();
        $menu = $products->getProductByPeriod();
        $category = $products->getOnlineProductCategory(1);
        return view('shop',compact('menu', 'category'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:20'],
                'description' => ['required', 'string', 'max:255'],
                'status' => ['required', 'string', 'max:10'],
                'inventory' => ['required', 'integer', 'min:0'],
                'price' => ['required', 'integer', 'min:1'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'The given data was invalid.']);
        }

        Product::query()
            ->create([
                'name' => $data['name'],
                'description' => $data['description'],
                'status' => $data['status'],
                'inventory' => $data['inventory'],
                'price' => $data['price'],
                'seller_id' => Auth::id()
            ]);

        return response()->json(['status' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     *
     * @return string
     */
    public function show($product)
    {
        //
        $data = Product::canShow()->find($product);
        if (!$data) {
            return response()->json(['status' => 'product doesn\'t exists.']);
        } else {
            return $data->first();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:200'],
                'description' => ['required', 'string', 'max:255'],
                'status' => ['required', 'string', 'max:10'],
                'inventory' => ['required', 'integer', 'min:0'],
                'price' => ['required', 'integer', 'min:1'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'The given data was invalid.']);
        }

        if (Auth::id() == $product->seller()->first()->id) {
            $product->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'status' => $data['status'],
                'inventory' => $data['inventory'],
                'price' => $data['price'],
            ]);
            return response()->json(['status' => 'update success']);
        } else {
            return response()->json(['status' => 'update failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        if (Auth::id() == $product->seller()->first()->id) {
            $product->delete();
            return response()->json(['status' => 'delete success']);
        } else {
            return response()->json(['status' => 'delete failed']);
        }
    }
}
