<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
        public function index() {
            return view('');
        }
        public function create() {
            $categories = Category::all();
            return view('admin.course.create', compact('categories'));
        }
        public function store(Request $request) {
            $request->validate([
                'category_id' =>'required',
                'title' =>'required',
                'description' =>'required',
                'long_description' =>'required|max:200',
                'slug' =>'required|unique:courses',
            ]);

            $course = new Course;
            $course->category_id = $request->category_id;
            $course->title = $request->title;
            $course->description = $request->description;
            $course->long_description = $request->long_description;
            $course->video = $request->video;
            $course->slug = Str::slug($request->slug);

            if($request->hasfile('image')){
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/course/', $filename);
                $course->image = $filename;
            }

            $course->meta_title = $request->meta_title;
            $course->meta_description = $request->meta_description;
            $course->price = $request->price;
            $course->save();
            return redirect('/admin/courses')->with('success', 'Course created successfully.');
        }
        public function edit($id) {
            return view('');
        }
        public function update($id) {

        }
        public function destroy($id) {

        }
}
