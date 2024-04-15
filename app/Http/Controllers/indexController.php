<?php

namespace App\Http\Controllers;

use App\Models\mainPhoto;
use App\Models\Poster;
use App\Models\Product;
use App\Models\Marquee;
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
        $products = new Poster();
        $poster = $products->get();
        $mainPhotos = new MainPhoto();
        $mainPhoto = $mainPhotos->get();

        $marquee = (new Marquee())->get();
        return view('index', compact('category', 'menu', 'poster', 'mainPhoto','marquee'));
    }
    public function getCSRFToken(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['token' => csrf_token()]);
    }

    public function contact(){
        return view('contact');
    }
}
