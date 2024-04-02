@extends('layouts.admin.master')

@section('title', 'Edit Category - ELearning')


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
    <a href="{{url('/admin/categories/')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> View all Categies</a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
              </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
              </div>
            @endif

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('/admin/category/update/'.$category->id)}}" method="post" class="card shadow rounded p-3" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="">Category Title</label>
                <input class="form-control" type="text" name="title" value="{{$category->title}}">
            </div>
            <div class="mb-3">
                <label for="">Category Description</label>
                <input class="form-control" type="text" name="description" value="{{$category->description}}">
            </div>
            <div class="mb-3">
                <label for="">Slug</label>
                <input class="form-control" type="text" name="slug" value="{{$category->slug}}">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <label for="">Category Thumbnail</label>
                <input class="form-control" type="file" name="image">
                </div>
                <div class="col-md-6">
                    <img src="{{asset('uploads/category/'.$category->image)}}" alt="" height="200">
                </div>
            </div>
            <div class="mb-3">
                <label for="">Meta Category Title</label>
                <input class="form-control" type="text" name="meta_title" value="{{$category->meta_title}}">
            </div>
            <div class="mb-3">
                <label for="">Meta Category Description</label>
                <input class="form-control" type="text" name="meta_description" value="{{$category->meta_description}}">
            </div>
            <div class="md-3">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection

