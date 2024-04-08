<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Category;

class CourseController extends Controller
{
    public function index($category_slug, $course_slug){
        $category = Category::where('slug', $category_slug)->first();
        $course = Course::where('slug', $course_slug)->first();
        return view ('client.course.index', compact('category', 'course'));
    }
}
