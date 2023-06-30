@extends('layouts.base')
@section('title')
    Create
@endsection
@section('main-content')
    <h1 class="text-center my-3">Add New User</h1>
    <div class="container">
        @if(session('error'))
            <div class="toast bg-danger d-block mx-auto mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <strong class="me-auto">User</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('error')}}
                </div>
            </div>
        @endif

        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="mb-3 col">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="mb-3 col">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3 col">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3 col">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" name="password" id="password" required/>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-success">Create</button>
                <a class="btn btn-danger" href="{{route('user.index')}}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
