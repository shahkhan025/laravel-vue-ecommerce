<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return inertia('Admin/Category/Show',compact('categories'));
    }

    public function create()
    {
        return inertia('Admin/Category/Create');
    }

    public function store(Request $request)
    {
        //return ($request->all());
//        $request->validate([
//            'image' => 'required|file|mimes: jpg,jpeg,png'
//        ]);
        $category = new Category();
//        dd($category->image);
//        return $category->image;

//        if (file_exists($request->file('image')))
//        {
//            $image = $request->file('image');
//            $imageName= $image->getClientOriginalName();
//            $image->move(public_path('images/brand'),$imageName);
//            $category->image = 'images/category/'.$imageName;
//        }
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route('category.show');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return inertia('Admin/Category/Edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
//        if ($request->hasFile('image')) {
//            $previousImagePath = public_path($category->image);
//            if (file_exists($previousImagePath)) {
//                unlink($previousImagePath);
//            }
//            $image = $request->file('image');
//            //$imageName = time().'.'.$image->getClientOriginalExtension();
//            $imageName= $image->getClientOriginalName();
//            $image->move(public_path('images/category'), $imageName);
//            $category->image = 'images/category/'.$imageName;
//        }
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route('category.show');

    }

    public function delete($id)
    {
        $category = Category::find($id);
//        $imagePath = public_path($category->image);
//        if (file_exists($imagePath)) {
//            unlink($imagePath);
//        }
        $category->delete();
        return redirect()->route('category.show');
    }
}
