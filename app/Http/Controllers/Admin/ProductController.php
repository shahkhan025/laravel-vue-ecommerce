<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return inertia('Admin/Product/Show',compact('products'));
    }

    public function create()
    {
        return inertia('Admin/Product/Create');
    }

    public function store(Request $request)
    {
        //return ($request->all());
        $request->validate([
            'image' => 'required|file|mimes: jpg,jpeg,png'
        ]);
        $product = new Product();
//        dd($Product->image);
//        return $Product->image;

        if (file_exists($request->file('image')))
        {
            $image = $request->file('image');
            $imageName= $image->getClientOriginalName();
            $image->move(public_path('images/product'),$imageName);
            $product->image = 'images/product/'.$imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->save();
        return redirect()->route('product.show');
    }

    public function edit($id)
    {
        $product = product::findOrFail($id);
        return inertia('Admin/Product/Edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            $previousImagePath = public_path($product->image);
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
            $image = $request->file('image');
            //$imageName = time().'.'.$image->getClientOriginalExtension();
            $imageName= $image->getClientOriginalName();
            $image->move(public_path('images/product'), $imageName);
            $product->image = 'images/product/'.$imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->save();
        return redirect()->route('product.show');

    }

    public function delete($id)
    {
        $product = Product::find($id);
        $imagePath = public_path($product->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();
        return redirect()->route('Product.show');
    }
}
