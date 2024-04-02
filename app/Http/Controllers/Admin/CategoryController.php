<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view ('admin.category.index', compact('categories'));
    }
    public function create() {
        return view('admin.category.create');
    }
    public function store(Request $request) {
        $newCategory = new Category;
        $newCategory->title = $request->title;
        $newCategory->description = $request->description;
        $newCategory->slug = Str::slug($request->slug);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $newCategory->image = $filename;
        }
        $newCategory->meta_title = $request->meta_title;
        $newCategory->meta_description = $request->meta_description;
        $newCategory->save();
        return redirect('admin/categories')->with('success', 'Category created successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        if($category){
            return view ('admin.category.edit', compact('category'));
        } else {
            return redirect('admin/categories')->with('error','No category found!');
        }
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        if($category){
            $category->title = $request->title;
            $category->description = $request->description;
            $category->slug = Str::slug($request->slug);

            if($request->hasfile('image')){
                $destination = 'uploads/category/'.$category->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/category/', $filename);
                $category->image = $filename;
            }
            $category->meta_title = $request->meta_title;
            $category->meta_description = $request->meta_description;
            $category->update();
            return redirect('admin/categories')->with('success', 'Category updated successfully');

        } else {
         return redirect()->back()->with('error','No category found!');
        }
    }
    //soft  delete
    public function destroy($id){
        $category = Category::find($id);
        if($category){
            $category->delete();
         return redirect()->back()->with('success','Category moved to trash');
        } else {
         return redirect()->back()->with('error','No category found!');
        }
    }

    //permanent  delete
    public function delete($id){
        $category = Category::withTrashed()->where('id',$id)->first();
        if($category){
            $destination = 'uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $category->forceDelete();
         return redirect()->back()->with('success','Category deleted successfully');
        } else {
         return redirect()->back()->with('error','No category found!');
        }
    }

    //Restore
    public function restore($id)
    {
        $category = Category::withTrashed()->where('id',$id)->first();
        if($category){
            $category->restore();
         return redirect()->back()->with('success','Category restored successfully');
        } else {
         return redirect()->back()->with('error','No category found!');
        }
    }



    public function trash(){
        $trashed_categories = Category::onlyTrashed()->get();
        return view('admin.trash', compact('trashed_categories'));
    }
}
