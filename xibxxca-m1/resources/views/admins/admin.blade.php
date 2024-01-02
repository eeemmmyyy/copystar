<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('resources/css/bootstrap.css')}}">
    <script src="{{asset('resources/js/bootstrap.js')}}"></script>
    <script src="{{asset('resources/js/bootstrap.bundle.js')}}"></script>
    <title>@yield('title', 'Панель админинстратора')</title>
</head>
<body>
@include('components.header')
<div class="container">
    <div class="row mt-lg-5">
        <div class="col">
            <a class="btn btn-primary me-2" href="{{ route('category') }}">Категории</a>
            <a class="btn btn-primary me-2" href="{{ route('product') }}">Товары</a>
            <a class="btn btn-primary" href="{{ route('admin.order') }}">Заказы</a>

        </div>
    </div>
</div>
@yield('content')
</body>
</html>
