<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return inertia('Frontend/Index', compact('sliders'));
    }

    public function shop()
    {
        $products = Product::all();
        return inertia('Frontend/Shop/Shop',compact('products'));
    }
}
