<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function HomeAbout(){
        $homeabout = HomeAbout::latest()->get();

        return view('admin.home.index', compact('homeabout'));
    }

    public function AddAbout(){

        return view('admin.home.create');
    }

    public function StoreAbout(Request $request){
        HomeAbout::insert([
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'long_description'  => $request->long_description,
            'created_at'        => Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success', 'About inserted succesfully');
    }

    public function EditAbout($id){
        $homeabout = HomeAbout::find($id);

        return view('admin.home.edit', compact('homeabout'));
    }

    public function UpdateAbout(Request $request, $id){
        HomeAbout::find($id)->update([
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'long_description'  => $request->long_description,
            'created_at'        => Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success', 'About updated succesfully');
    }

    public function DeleteAbout($id){
        HomeAbout::find($id)->delete();

        return Redirect()->back()->with('success', 'About deleted succesfully');
    }

    public function Portfolio(){
        $images = Multipic::all();

        return view('pages.portfolio', compact('images'));
    }
}
