<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Phattarachai\LineNotify\Facade\Line;

class indexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $products = new Product();
        $category = $products->getProductCategory(1);
        $menu = $products->getProduct();

        return view('index', compact('category', 'menu'));
    }
    public function getCSRFToken(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['token' => csrf_token()]);
    }

    public function contact(){
        return view('contact');
    }
}
