@extends('layouts.client.master')

@section( 'title', 'ELearning' )


@section('content')

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">Discover. Learn. Enjoy</h1>

                <h6 class="text-center">platform for creatives around the world</h6>

                <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1">

                        </span>

                        <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Design, Code, Marketing, Finance ..." aria-label="Search">

                        <button type="submit" class="form-control">Search</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row">
        @php
            $featured_categories = App\Models\FeaturedCategory::all();
        @endphp

        @foreach ($featured_categories as $category)
        <div class="col-lg-4 col-md-6 col-12">
            <div class="custom-block bg-white shadow-lg">
                <a href="topics-detail.html">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-2">{{$category->category->title}}</h5>
                        </div>
                    </div>
                    <img src="{{asset('uploads/category/'.$category->category->image)}}" class="custom-block-image img-fluid" alt="">
                    <div>
                        <div>
                        <a href="#" class="btn btn-info">Browse</a>
                    </div>
                </div>
                </a>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection
