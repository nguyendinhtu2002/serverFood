@extends('layouts.base')
@section('title')
    Edit
@endsection
@section('main-content')
    <div class="container">
        <h1 class="text-center my-3">Edit Voting Event</h1>
        @if(session('error'))
            <div class="toast bg-danger d-block mx-auto mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <strong class="me-auto">Food</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('error')}}
                </div>
            </div>
        @endif

        <form action="{{route('food.update',['id'=>$food->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 col">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{$food->name}}"
                       required>
            </div>

            <div class="mb-3 col">
                <label for="image" class="form-label">Image</label>
                <input type="text" id="image" name="image" class="form-control" value="{{$food->image}}"
                       required>
            </div>

            <div class="mb-3 col">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description"  rows="2">{{$food->description}}</textarea>
            </div>

            <div class="mb-3 col">
                <label for="price" class="form-label">Price</label>
                <input type="text" id="price" name="price" class="form-control"
                       value="{{$food->price}}" required>
            </div>
            <div class="mb-3 col">
                <label for="discount" class="form-label">Discount</label>
                <input type="text" id="discount" name="discount" class="form-control"
                       value="{{$food->discount}}" required>
            </div>

            <div class="mb-3 col">
                <label for="menu_id" class="form-label">Menu_id</label>
                <input type="text" id="menu_id" name="menu_id" class="form-control"
                       value="{{$food->menu_id}}" required>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-success">Edit</button>
                <a class="btn btn-danger" href="{{route('food.index')}}">Cancel</a></div>


        </form>

    </div>
@endsection
