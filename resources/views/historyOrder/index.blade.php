@extends('layouts.base')
@section('title')
    HomePage
@endsection
@section('main-content')
    <div class="container mx-auto">
        @if(session('success'))
            <div class="toast bg-success d-block mx-auto mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <strong class="me-auto">History Order</strong>
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
                    <strong class="me-auto">History Order</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('error')}}
                </div>
            </div>
        @endif
        <div class="d-flex my-3" style="justify-content: space-between">
            <h1 class="">History Orders List</h1>
        </div>
        <table class="table table-striped mt-1">
            <thead>
            <!--        table row-->
            <tr class="border">
                <!--            table heading-->
                <th>#</th>
                <th>Order ID</th>
                <th>User Phone</th>
                <th>Delivery Address</th>
                <th colspan="1" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody >
            <?php $index = 1; ?>
            @foreach ($historyOrders as $historyOrder)
                <tr class="border">
                    <th>{{$index++}}</th>
                    <td>{{$historyOrder->order_id}}</td>
                    <td>{{$historyOrder->user_phone}}</td>
                    <td>{{$historyOrder->delivery_address}}</td>
                    <td class="d-flex gap-3 justify-content-center">
                        <a href="{{route('historyOrder.edit',['order_id'=>$historyOrder->order_id,'user_phone'=>$historyOrder->user_phone])}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('historyOrder.delete',['order_id'=>$historyOrder->order_id,'user_phone'=>$historyOrder->user_phone])}}" method="post">
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
