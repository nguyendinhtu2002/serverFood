@extends('layouts.base')
@section('title')
    Edit
@endsection
@section('main-content')
    <div class="container">
        <h1 class="text-center my-3">Edit History Order</h1>
        @if(session('error'))
            <div class="toast bg-danger d-block mx-auto mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <strong class="me-auto">History Order</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('error')}}
                </div>
            </div>
        @endif

        <form action="{{route('historyOrder.update',['order_id'=>$historyOrder->order_id,'user_phone'=>$historyOrder->user_phone])}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 col">
                <label for="order_id" class="form-label">Name</label>
                <input type="text" id="order_id" name="order_id" class="form-control" readonly value="{{$historyOrder->order_id}}">
            </div>
            <div class="mb-3 col">
                <label for="user_phone" class="form-label">Phone</label>
                <input type="text" id="user_phone" name="user_phone" class="form-control" readonly value="{{$historyOrder->user_phone}}">
            </div>


            <div class="mb-3 col">
                <label for="delivery_address" class="form-label">Delivery Address</label>
                <input type="text" id="delivery_address" name="delivery_address" class="form-control" value="{{$historyOrder->delivery_address}}"
                       required>
            </div>

            <div class="mb-3 col">
                <label for="status" class="form-label">Status</label>
                <input type="text" id="status" name="status" class="form-control" value="{{$historyOrder->status}}"
                       required>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-success">Edit</button>
                <a class="btn btn-danger" href="{{route('historyOrder.index')}}">Cancel</a></div>


        </form>

    </div>
@endsection
