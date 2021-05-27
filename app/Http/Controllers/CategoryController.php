<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    //
    public function AllCat()
    {
        $categories = Category::latest()->paginate(5);

        // $categories = DB::table('categories')->latest()->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function AddCat(Request $request)
    {
        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:30',
            ],
            [
                'category_name.required' => 'Please input category name.',
                'category_name.max' => 'Category should be less than 30'
            ]
        );

        Category::insert([
            'category_name' => $request->category_name,
            'user_id'       => Auth::user()->id,
            'created_at'    => Carbon::now()
        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        // $data = array();

        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;

        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success', 'Category Inserted Succesfully');
    }
}
