<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

//\Illuminate\Http\Request
class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return inertia('Admin/Slider/Show',compact('sliders'));
    }

    public function create()
    {
        return inertia('Admin/Slider/Create');
    }

    public function store(Request $request)
    {
        //return ($request->all());
        $request->validate([
            'image' => 'required|file|mimes: jpg,jpeg,png'
        ]);
        $slider = new Slider();
//        dd($slider->image);
//        return $slider->image;

        if (file_exists($request->file('image')))
        {
            $image = $request->file('image');
            $imageName= $image->getClientOriginalName();
            $image->move(public_path('images/slider'),$imageName);
            $slider->image = 'images/slider/'.$imageName;
        }
        $slider->title = $request->title;
        $slider->position = $request->position;
        $slider->description = $request->description;
        $slider->btn_name = $request->btn_name;
        $slider->btn_link = $request->btn_link;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('slider.show');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return inertia('Admin/Slider/Edit',compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        if ($request->hasFile('image')) {
            $previousImagePath = public_path($slider->image);
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
            $image = $request->file('image');
            //$imageName = time().'.'.$image->getClientOriginalExtension();
            $imageName= $image->getClientOriginalName();
            $image->move(public_path('images/slider'), $imageName);
            $slider->image = 'images/slider/'.$imageName;
        }
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->position = $request->position;
        $slider->btn_name = $request->btn_name;
        $slider->btn_link = $request->btn_link;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('slider.show');

    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        $imagePath = public_path($slider->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $slider->delete();
        return redirect()->route('slider.show');
    }


}
