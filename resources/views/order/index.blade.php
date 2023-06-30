@extends('layouts.base')
@section('title')
    HomePage
@endsection
@section('main-content')
    <div class="container mx-auto">
        @if(session('success'))
            <div class="toast bg-success d-block mx-auto mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <strong class="me-auto">Order</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('success')}}
                </div>
            </div>
        @endif

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
        <div class="d-flex my-3" style="justify-content: space-between">
            <h1 class="text-center">Orders List</h1>
        </div>
        <table class="table table-striped mt-1">
            <thead>
            <!--        table row-->
            <tr class="border">
                <!--            table heading-->
                <th>#</th>
                <th>User Phone</th>
                <th>Food Name</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th colspan="1" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody >
            <?php $index = 1; ?>
            @foreach ($orders as $order)
                <tr class="border">
                    <th>{{$index++}}</th>
                    <td>{{$order->user_phone}}</td>
                    <td>{{$order->food->name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->discount}}</td>
                    <td class="d-flex gap-3 justify-content-center">
                        <a href="{{route('order.edit',['id'=>$order->id])}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('order.delete',['id'=>$order->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Do you want to delete')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
