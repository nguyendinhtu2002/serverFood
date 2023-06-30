@extends('layouts.base')
@section('title')
    Edit
@endsection
@section('main-content')
    <div class="container">
        <h1 class="text-center my-3">Edit Category</h1>
        @if(session('error'))
            <div class="toast bg-danger d-block mx-auto mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <strong class="me-auto">Category</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('error')}}
                </div>
            </div>
        @endif

        <form action="{{route('category.update',['id'=>$category->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 col">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{$category->name}}"
                       required>
            </div>

            <div class="mb-3 col">
                <label for="image" class="form-label">Email</label>
                <input type="text" id="image" name="image" class="form-control" value="{{$category->image}}"
                       required>
            </div>



            <div class="d-flex gap-2">
                <button class="btn btn-success">Edit</button>
                <a class="btn btn-danger" href="{{route('category.index')}}">Cancel</a></div>


        </form>

    </div>
@endsection
