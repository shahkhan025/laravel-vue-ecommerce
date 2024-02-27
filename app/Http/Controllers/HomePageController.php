<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $categories = Category::all();
        $products = Product::all();
        return inertia('Frontend/Index', compact('sliders','categories','products'));
    }

    public function shop()
    {
        $products = Product::all();
        return inertia('Frontend/Shop/Shop',compact('products'));
    }
        public function detail($id)
        {
            //$user = auth()->user();
            $product = Product::find($id);
            return inertia('Frontend/Shop/ProductDetail',compact('product'));
        }

}
