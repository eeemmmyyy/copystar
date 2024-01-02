@extends('welcome')
@section('title', $productOne->product_name)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="card">
                    <a href="">
                        <img src="{{asset('storage/app/public/'.$productOne->product_photo)}}" height="400px" width="500px" style="object-fit: cover; object-position: center" class="card-img-top" alt="фото товара">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$productOne->product_name}}</h5>
                        <p class="card-text">{{$productOne->product_description}}</p>
                        <p class="card-text">Цена: {{$productOne->product_price}}</p>
                        <p class="card-text">Страна производства: {{$productOne->product_country}}</p>
                        <p class="card-text">Год выпуска: {{$productOne->product_year}}</p>
                        <p class="card-text">Количество: {{$productOne->product_count}}</p>
                        @auth
                            <form action="{{route('basket.add', $productOne)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">В корзину</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
