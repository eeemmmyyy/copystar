@extends('welcome')
@section('title', 'Каталог')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="d-flex" action="" method="get">
                    <select class="form-select" name="sort_price" id="">
                        <option value="asc" {{request('sort_price') == 'asc' ? 'selected' : ''}}>По возрастанию цены
                        </option>
                        <option value="desc" {{request('sort_price') == 'desc' ? 'selected' : ''}}>По убыванию цены
                        </option>
                    </select>
                    <select class="form-select" name="sort_name" id="">
                        <option value="asc" {{request('sort_name') == 'asc' ? 'selected' : ''}}>По названию(А-Я)
                        </option>
                        <option value="desc" {{request('sort_name') == 'desc' ? 'selected' : ''}}>По названию(Я-А)
                        </option>
                    </select>
                    <select class="form-select" name="sort_year" id="">
                        <option value="asc" {{request('sort_year') == 'asc' ? 'selected' : ''}}>По году
                            производства(сначала новые)
                        </option>
                        <option value="desc" {{request('sort_year') == 'desc' ? 'selected' : ''}}>По году
                            производства(сначала старые)
                        </option>
                    </select>
                    <select class="form-select" name="category" id="">
                        <option value="">Все категории</option>
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary">Применить</button>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col"></div>
            <div class="col-12 d-flex flex-wrap justify-content-center">
                @foreach($products as $product)
                    <div class="card" style="width: 18rem;">
                        <a href="{{route('catalog_product', $product)}}">
                            <img src="{{asset('storage/app/public/'.$product->product_photo)}}" height="200px"
                                 style="object-fit: cover; object-position: center" class="card-img-top"
                                 alt="фото товара">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$product->product_name}}</h5>
                            <p class="card-text">{{$product->product_price}}</p>
                            @auth
                                <form action="{{route('basket.add', $product)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">В корзину</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
