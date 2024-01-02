@extends('welcome')
@section('title', 'О нас')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            @if($products)
                @foreach($products as $key=>$product)
                    <div class="carousel-item  @if($key === 0)active @endif">
                        <img src="{{asset('storage/app/public/'.$product->product_photo)}}" class="d-block m-auto w-50" style="object-fit: cover; object-position: center"  alt="фото товара">
                        <div class="carousel-caption d-none d-md-block m-auto">
                            <h5 style="background: #5c636a">{{$product->product_name}}</h5>
                            <p style="background: #5c636a">{{$product->product_price}}</p>
                        </div>
                    </div>

                @endforeach
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection
