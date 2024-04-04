@extends('layouts.admin.master')


@section( 'title', 'Featured Categories - ELearning' )

@section('content')

    <div class="container py-3">
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
                <form action="{{url('/admin/featured/categories/store')}}" method="post" class="d-flex">
                    @csrf
                    <select name="category_id" class="form-control me-3" >
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-12 card rounded shadow">
               <table class="table">
                <thead>
                <tr>
                    <th scope="col">Category Title</th>
                    <th scope="col">Action</th>
                </tr>
                 </thead>
                 @foreach ($featured_categories as $fcat)
                 <tr>
                    <td>{{$fcat->category->title}}</td>
                    <td>
                        <a href="{{url('/admin/featured/categories/delete/'.$fcat->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                 @endforeach
               </table>
            </div>
        </div>
    </div>

@endsection
