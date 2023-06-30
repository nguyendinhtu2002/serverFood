@extends('layouts.base')
@section('title')
    Create
@endsection
@section('main-content')
    <h1 class="text-center my-3">Add New Category</h1>
    <div class="container">
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

        <form action="{{route('category.store')}}" method="post">
            @csrf
            <div class="mb-3 col">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3 col">
                <label for="image" class="form-label">Image</label>
                <input type="text" id="image" name="image" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-success">Create</button>
                <a class="btn btn-danger" href="{{route('category.index')}}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
