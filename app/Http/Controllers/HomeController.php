<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Slider;
use Image;
use Auth;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider(){

        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request){


        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
        Image::make($slider_image)->save('images/slider/' . $name_gen);

        $last_img = 'images/slider/' . $name_gen;

        Slider::insert([
            'title'         => $request->title,
            'description'   => $request->description,
            'image'         => $last_img,
            'created_at'    => Carbon::now()
        ]);

        return Redirect()->route('home.slider')->with('success', 'Slider added successfully');
    }
}
