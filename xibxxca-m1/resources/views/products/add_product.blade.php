@extends('admins.admin')
@section('title', 'Товары')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2>Добавить товар</h2>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Название</label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                               id="product_name" name="product_name">
                        @error('product_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_country" class="form-label">Страна производитель</label>
                        <input type="text" class="form-control @error('product_country') is-invalid @enderror"
                               id="product_country" name="product_country">
                        @error('product_country')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_year" class="form-label">Год производства</label>
                        <input type="text" class="form-control @error('product_year') is-invalid @enderror"
                               id="product_year" name="product_year">
                        @error('product_year')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_count" class="form-label">Количество</label>
                        <input type="number" class="form-control @error('product_count') is-invalid @enderror"
                               id="product_count" name="product_count">
                        @error('product_count')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Категория</label>
                        <select type="text" class="form-control @error('category_id') is-invalid @enderror"
                                name="category_id" id="category_id">
                            <option selected>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_price" class="form-label">Цена</label>
                        <input type="text" class="form-control @error('product_price') is-invalid @enderror"
                               id="product_price" name="product_price">
                        @error('product_price')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_description" class="form-label">Описание</label>
                        <textarea class="form-control @error('product_description') is-invalid @enderror"
                                  name="product_description" id="product_description" rows="3"></textarea>

                        @error('product_description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_photo" class="form-label">Фото</label>
                        <input type="file" class="form-control @error('product_photo') is-invalid @enderror"
                               id="product_photo" name="product_photo">
                        @error('product_photo')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                @if(session()->has('add_product'))
                    <div class="alert alert-success">Вы успешно добавили продукт {{session()->get('add_product')}}
                    </div>
                @endif
                @if(session()->has('edit_product'))
                    <div class="alert alert-success">Вы успешно изменили
                        продукт {{session()->get('edit_product')}}</div>
                @endif
                @if(session()->has('delete_product'))
                    <div class="alert alert-success">Вы успешно удалили
                        продукт {{session()->get('delete_product')}}</div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Страна производитель</th>
                        <th scope="col">Год производства</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Фото</th>
                        <th scope="col">Описание</th>
                        <th scope="col" class="text-center">Изменение</th>
                        <th scope="col" class="text-center">Удаление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_country}}</td>
                            <td>{{$product->product_year}}</td>
                            <td>{{$product->product_count}}</td>
                            <td>{{$product->category()}}</td>
                            <td>{{$product->product_price}}</td>
                            <td><img style="max-width: 150px" src="{{asset('storage/app/public/'.$product->product_photo)}}"
                                     alt="фото товара"></td>
                            <td>{{$product->product_description}}</td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{$product->id}}">
                                    Изменить
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{$product->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение
                                                    товара {{$product->product_name}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('editProduct',$product)}}"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <h2>Изменить товар</h2>
                                                    <div class="mb-3">
                                                        <label for="product_name" class="form-label">Название</label>
                                                        <input type="text"
                                                               class="form-control @error('product_name') is-invalid @enderror"
                                                               value="{{$product->product_name}}"
                                                               id="product_name" name="product_name">
                                                        @error('product_name')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_country" class="form-label">Страна
                                                            производитель</label>
                                                        <input type="text"
                                                               class="form-control @error('product_country') is-invalid @enderror"
                                                               value="{{$product->product_country}}"
                                                               id="product_country" name="product_country">
                                                        @error('product_country')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_year" class="form-label">Год
                                                            производства</label>
                                                        <input type="text"
                                                               class="form-control @error('product_year') is-invalid @enderror"
                                                               value="{{$product->product_year}}"
                                                               id="product_year" name="product_year">
                                                        @error('product_year')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_count" class="form-label">Количество</label>
                                                        <input type="number"
                                                               class="form-control @error('product_count') is-invalid @enderror"
                                                               value="{{$product->product_count}}"
                                                               id="product_count" name="product_count">
                                                        @error('product_count')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="category_id" class="form-label">Категория</label>
                                                        <select type="text"
                                                                class="form-control @error('category_id') is-invalid @enderror"
                                                                name="category_id" id="category_id">
                                                            <option selected
                                                                    value="{{$product->category_id}}">{{$product->category()}}</option>
                                                            @foreach($categories as $category)
                                                                <option
                                                                    value="{{$category->id}}">{{$category->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_price" class="form-label">Цена</label>
                                                        <input type="text"
                                                               class="form-control @error('product_price') is-invalid @enderror"
                                                               value="{{$product->product_price}}"
                                                               id="product_price" name="product_price">
                                                        @error('product_price')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_description"
                                                               class="form-label">Описание</label>
                                                        <textarea class="form-control @error('product_description') is-invalid @enderror" name="product_description" id="product_description" rows="3">{{$product->product_description}}</textarea>

                                                        @error('product_description')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="form-label">Активное фото</p>
                                                        <div class="text-center">
                                                            <img style="max-width: 300px" src="{{asset('storage/app/public/'.$product->product_photo)}}" alt="фото активное">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="product_photo1" class="form-label">Фото</label>
                                                        <input type="file" class="form-control @error('product_photo') is-invalid @enderror" id="product_photo" name="product_photo1">
                                                        @error('product_photo')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Изменить</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{$product->id}}">
                                    Удалить
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Удаление
                                                    товара {{$product->product_name}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Удаление товара {{$product->product_name}} приведёт к удалению всех
                                                связанных с ним заказов.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Отменить
                                                </button>
                                                <form method="POST" action="{{route('delProduct',$product)}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
