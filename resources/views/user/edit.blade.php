@extends('layouts.base')
@section('title')
    Edit
@endsection
@section('main-content')
    <div class="container">
        <h1 class="text-center my-3">Edit User</h1>
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

        <form action="{{route('user.update',['phone'=>$user->phone])}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 col">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" readonly value="{{$user->phone}}">
            </div>
            <div class="mb-3 col">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}"
                       required>
            </div>

            <div class="mb-3 col">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}"
                       required>
            </div>

            <div class="mb-3 col">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                       value="{{$user->password}}" required>
            </div>


            <div class="d-flex gap-2">
                <button class="btn btn-success">Edit</button>
                <a class="btn btn-danger" href="{{route('user.index')}}">Cancel</a></div>


        </form>

    </div>
@endsection
