<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Image;

class BrandController extends Controller
{
    //
    public function AllBrand(){
        $brands = Brand::latest()->paginate(5);

        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request){
        $validated = $request->validate(
            [
                'brand_name'    => 'required|unique:brands|min:4',
                'brand_image'   => 'required|mimes:jpg,jpeg,png' 
            ],
            [
                'brand_name.required' => 'Please input brand name.',
                'brand_name.max' => 'Brand name longer than 4 characters'
            ]
        );

        $brand_image = $request->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen . '.' . $img_ext;
        // $up_location = 'image/brand/';
        // $last_image = $up_location . $img_name;
        // $brand_image->move($up_location, $img_name);

        $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $name_gen);

        $last_img = 'image/brand/' . $name_gen;

        Brand::insert([
            'brand_name'    => $request->brand_name,
            'brand_image'   => $last_img,
            'created_at'    => Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Brand inserted successfully');
    }

    public function Edit($id){
        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
    }

    public function Update(Request $request, $id){
        $validated = $request->validate(
            [
                'brand_name'    => 'required|min:4',
             ],
            [
                'brand_name.required' => 'Please input brand name.',
                'brand_name.max' => 'Brand name longer than 4 characters'
            ]
        );

        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');

        if($brand_image){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/brand/';
            $last_image = $up_location . $img_name;
            $brand_image->move($up_location, $img_name);

            unlink($old_image);

            Brand::find($id)->update([
                'brand_name'    => $request->brand_name,
                'brand_image'   => $last_image,
                'created_at'    => Carbon::now()
            ]);
        }else{
            Brand::find($id)->update([
                'brand_name'    => $request->brand_name,
                'created_at'    => Carbon::now()
            ]);
        }

        return Redirect()->back()->with('success', 'Brand updated successfully');
    }

    public function Delete($id){
        $images = Brand::find($id);
        $old_image = $images->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();

        return Redirect()->back()->with('success', 'Brand deleted successfully');
    }

    // This is for multi image all methods
    public function Multipic(){
        $images = Multipic::all();

        return view('admin.multipic.index', compact('images'));
    }
}
