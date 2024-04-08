@extends('layouts.client.master')

@section('title', $category->title . ' - ELearning')

@section('content')
<section class="section-padding section-bg">
    <div class="container">

        <div class="row my-5">
            <div class="col-md-12">
                <form action="{{ url('/search') }}" method="post"
                    class="d-flex align-items-center bg-white rounded p-2 shadow-sm">
                    @csrf
                    <input type="text" name="title" class="form-control me-3" placeholder="Search a course...">
                    <label for="">Free</label>
                    <input type="checkbox" name="free" class="me-3">
                    <label for="">Paid</label>
                    <input type="checkbox" name="paid" class="me-3">
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="row">
        @foreach ($courses as $course)
        <div class="col-lg-4 col-md-6 col-12">
            <div class="custom-block bg-white shadow-lg">
                <a href="{{url('/category/' . $category->slug . '/' . $course->slug)}}">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-2">{{$course->title}}</h5>
                        </div>
                    </div>
                    <img src="{{asset('uploads/course/'.$course->image)}}" class="custom-block-image img-fluid" alt="">
                    <div>
                        <div>
                        <a href="{{url('/category/' . $category->slug . '/' . $course->slug)}}" class="btn btn-info">Browse</a>
                    </div>
                </div>
                </a>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $courses->links() }}
        </div>
        </div>
        </div>
 </section>
@endsection
