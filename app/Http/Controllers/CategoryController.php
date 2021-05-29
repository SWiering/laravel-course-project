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
        // $categories = DB::table('categories')
        //         ->join('users', 'categories.user_id', 'users.id')
        //         ->select('categories.*', 'users.name')
        //         ->latest()
        //         ->paginate(5);

        $categories = Category::latest()->paginate(5);

        $trashCat = Category::onlyTrashed()->latest()->paginate(3);

        // $categories = DB::table('categories')->latest()->paginate(5);

        return view('admin.category.index', compact('categories', 'trashCat'));
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

    public function Edit($id){
        // $categories = Category::find($id);

        $categories = DB::table('categories')
                    ->where('id', $id)
                    ->first();

        return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request, $id){
        // Category::find($id)->update([
        //     'category_name' => $request->category_name,
        //     'user_id'       => Auth::user()->id,
        // ]);

        $data = array();

        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;

        DB::table('categories')
            ->where('id', $id)
            ->update($data);

        return Redirect()->route('all.category')->with('success', 'Category updated succesfully');

    }

    public function SoftDelete($id){
        Category::find($id)->delete();

        return Redirect()->back()->with('success', 'Category deleted successfully');
    }
    
    public function Restore($id){
        Category::withTrashed()->find($id)->restore();

        return Redirect()->back()->with('success', 'Category restored successfully');
    }

    public function Pdelete($id){
        Category::onlyTrashed()->find($id)->forceDelete();

        return Redirect()->back()->with('success', 'Category premanently deleted successfully');
    }
}
