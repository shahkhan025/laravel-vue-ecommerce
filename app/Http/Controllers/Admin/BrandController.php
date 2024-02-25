<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return inertia('Admin/Brand/Show',compact('brands'));
    }

    public function create()
    {
        return inertia('Admin/Brand/Create');
    }

    public function store(Request $request)
    {
        //return ($request->all());
        $request->validate([
            'image' => 'required|file|mimes: jpg,jpeg,png'
        ]);
        $brand = new Brand();
//        dd($Brand->image);
//        return $Brand->image;

        if (file_exists($request->file('image')))
        {
            $image = $request->file('image');
            $imageName= $image->getClientOriginalName();
            $image->move(public_path('images/brand'),$imageName);
            $brand->image = 'images/brand/'.$imageName;
        }
        $brand->brand_name = $request->brand_name;
        $brand->save();
        return redirect()->route('brand.show');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return inertia('Admin/Brand/Edit',compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        if ($request->hasFile('image')) {
            $previousImagePath = public_path($brand->image);
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
            $image = $request->file('image');
            //$imageName = time().'.'.$image->getClientOriginalExtension();
            $imageName= $image->getClientOriginalName();
            $image->move(public_path('images/brand'), $imageName);
            $brand->image = 'images/brand/'.$imageName;
        }
        $brand->brand_name = $request->brand_name;
        $brand->save();
        return redirect()->route('brand.show');

    }

    public function delete($id)
    {
        $Brand = Brand::find($id);
        $imagePath = public_path($Brand->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $Brand->delete();
        return redirect()->route('brand.show');
    }
}
