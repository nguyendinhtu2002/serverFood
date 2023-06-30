@extends('layouts.base')
@section('title')
    Edit
@endsection
@section('main-content')
    <div class="container">
        <h1 class="text-center my-3">Edit Order</h1>
        @if(session('error'))
            <div class="toast bg-danger d-block mx-auto mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <strong class="me-auto">Order</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('error')}}
                </div>
            </div>
        @endif

        <form action="{{route('order.update',['id'=>$order->id])}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 col">
                <label for="user_phone" class="form-label">user_phone</label>
                <input type="text" id="user_phone" name="user_phone" class="form-control" readonly value="{{$order->user_phone}}">
            </div>
            <div class="mb-3 col">
                <label for="food_id" class="form-label">Food Name</label>
                <input type="text" id="food_id" name="food_id" class="form-control" readonly value="{{$order->food->name}}">
            </div>

            <div class="mb-3 col">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" id="quantity" name="quantity" class="form-control" value="{{$order->quantity}}"
                       required>
            </div>

            <div class="mb-3 col">
                <label for="discount" class="form-label">Discount</label>
                <input type="text" id="discount" name="discount" class="form-control"
                       value="{{$order->discount}}" required>
            </div>


            <div class="d-flex gap-2">
                <button class="btn btn-success">Edit</button>
                <a class="btn btn-danger" href="{{route('order.index')}}">Cancel</a></div>


        </form>

    </div>
@endsection
