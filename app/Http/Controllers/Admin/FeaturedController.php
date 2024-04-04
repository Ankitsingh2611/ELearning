<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\FeaturedCategory;

class FeaturedController extends Controller
{
    public function view_featured_categories() {
        $categories = Category::all();
        $featured_categories =  FeaturedCategory::all();
        return view ('admin.featured.category', compact('categories', 'featured_categories'));
    }

    public function store_featured_category(Request $request){
        $category = FeaturedCategory::find($request->category_id);
        if ($category) {
            return redirect('/admin/featured/categories')->with("error", "Category already added to featured category list");
        } else {
            $featuredCategory = new FeaturedCategory;
            // dd($request->all());
            $featuredCategory->category_id = $request->category_id;
            $featuredCategory->save();

            return redirect('/admin/featured/categories')->with("success", "Category has been added to featured category list");
        }
    }

    public function remove_featured_category($id)
    {
        $featuredCategory  = FeaturedCategory::find($id);
        if($featuredCategory){
            $featuredCategory->delete();
            return redirect('/admin/featured/categories')->with("success", "Category removed successfully from featured list.");
        } else {
            return redirect('/admin/featured/categories')->with("error", "Category not found!");
        }
    }

    public function view_featured_courses() {
        return view ('admin.featured.course');
    }

}
