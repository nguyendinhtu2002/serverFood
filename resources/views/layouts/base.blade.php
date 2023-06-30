<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="{{asset('/css/bootstrap.css')}}">
    <title>@yield('title')</title>
</head>
<body>
<header class="d-flex flex-wrap justify-content-center p-3 mb-4 border-bottom">
    <a href="{{route('home')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <h1 class="fs-4">Order Food</h1>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{route('user.index')}}" class="nav-link link-primary">User</a></li>
        <li class="nav-item"><a href="{{route('category.index')}}" class="nav-link link-primary">Category</a></li>
        <li class="nav-item"><a href="{{route('food.index')}}" class="nav-link link-primary">Food</a></li>
        <li class="nav-item"><a href="{{route('order.index')}}" class="nav-link link-primary">Order</a></li>
        <li class="nav-item"><a href="{{route('historyOrder.index')}}" class="nav-link link-primary">History Order</a></li>
    </ul>
</header>

@yield('main-content')

@yield('sub-content')


<script !src="{{asset('/js/bootstrap.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var closeButton = document.querySelector('.btn-close');
        var toast = document.querySelector('.toast');

        closeButton.addEventListener('click', function () {
            toast.classList.add('d-none');
        });
    });
</script>
</body>
</html>
