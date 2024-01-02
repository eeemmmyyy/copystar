@extends('admins.admin')
@section('title', 'Управление заказами')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h1>Заказы админинстратора</h1>
                <form action="{{route('admin.order.sort')}}" method="post">
                    @csrf
                    <select name="status_id" class="form-select">
                        <option value="">Все заказы</option>
                        <option value="1" {{request('status_id')==1 ? 'selected' : ''}}>Новые заказы</option>
                        <option value="2" {{request('status_id')==2 ? 'selected' : ''}}>Подтвержденные заказы</option>
                        <option value="3" {{request('status_id')==3 ? 'selected' : ''}}>Отмененные заказы</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Фильтровать</button>
                </form>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="accordion" id="accordionExample">
                    @foreach($orders as $order)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$order->id}}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                    {{$order->create_at}}
                                    - {{$order->user->surname}} {{$order->user->name}} {{$order->user->patronymic}}
                                    - {{$order->order_count}} товаров


                                </button>
                            </h2>
                            <div id="collapse{{$order->id}}" class="accordion-collapse collapse show"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Статус: {{$order->status()}}</p>
                                    @if($order->status_id == 1)
                                        <form
                                            action="{{route('admin.order.status', ['orderId'=>$order->id, 'action'=>'cancel'])}}"
                                            method="post">
                                            @csrf
                                            <input class="form-control" type="text" name="order_comment"
                                                   placeholder="Причина отмены">
                                            <button class="btn btn-danger" type="submit">Отменить заказ</button>
                                        </form>
                                        <form

                                            action="{{route('admin.order.status', ['orderId'=>$order->id, 'action'=>'confirm'])}}"
                                            method="post">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Подтвердить заказ</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

            <div class="col"></div>
        </div>
    </div>
@endsection
