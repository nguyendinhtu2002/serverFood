@extends('layouts.base')
@section('title')
    HomePage
@endsection
@section('main-content')
    <div class="container mx-auto">
        @if(session('success'))
            <div class="toast bg-success d-block mx-auto mb-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header ">
                    <strong class="me-auto">Food</strong>
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
                    <strong class="me-auto">Food</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{session('error')}}
                </div>
            </div>
        @endif
        <div class="d-flex my-3" style="justify-content: space-between">
            <h1 class="text-center">Voting Events List</h1>
            <a href="{{route('food.create')}}" class="btn btn-success d-flex align-items-center">Add New Food</a>
        </div>
        <table class="table table-striped mt-1">
            <thead>
            <!--        table row-->
            <tr class="border">
                <!--            table heading-->
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Menu ID</th>
                <th colspan="1" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody >
            <?php $index = 1; ?>
            @foreach ($foods as $food)
                <tr class="border">
                    <th>{{$index++}}</th>
                    <td>{{$food->name}}</td>
                    <td>{{$food->image}}</td>
                    <td>{{$food->description}}</td>
                    <td>{{$food->price}}</td>
                    <td>{{$food->discount}}</td>
                    <td>{{$food->menu_id}}</td>
{{--                    <td>{{$food->manager ? $food->manager->name : 'N/A'}}</td>--}}
                    <td class="d-flex gap-3 justify-content-center">
{{--                        <a href="" class="btn btn-info">Detail</a>--}}
                        <a href="{{route('food.edit',['id'=>$food->id])}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('food.delete',['id'=>$food->id])}}" method="post">
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
