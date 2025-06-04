@extends('shop.layouts.main')

@section('title')
    Личный кабинет
@endsection

@section('content')
    @csrf

    <div class="bg-body rounded w-100 p-4">
        <div class="d-flex justify-content-between align-items-center">
            <div><a href="#" class="no-decorate">{{ $user->name }}</a></div>
            <div><a href="#" class="btn btn-secondary">Параметры</a></div>
        </div>
        <div>
            <div class="d-flex justify-content-between align-items-center mt-2">
                <div>
                    Баланс: {{ $user->balance }}
                </div>
                <div><a href="#" class="btn btn-secondary">Пополнить баланс</a></div>
            </div>
        </div>
    </div>

    <div class="bg-body rounded w-100 p-4 mt-3 mb-3">
        <div>
            <p>Доствки:</p>
            @if (count($userOrders) != 0)
                <div class="container py-4">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-4">
                        @foreach ($userOrders as $userOrder)
                            <div class="col">
                                <div class="card position-relative h-100">
                                    <img src="..." class="card-img-top" alt="Изображение">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $products->find($userOrder->product_id)->cost }} ₽</h6>
                                        <p class="card-text small">
                                            {{ $products->find($userOrder->product_id)->title }}
                                        </p>
                                        <div class="text-center text-warning small"> {{ $userOrder->status }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center">
                    <p>Пока нет доставок</p>
                    <a href="{{ route('index') }}" class="btn btn-primary">Перейти в каталог</a>
                </div>
            @endif
        </div>
    </div>
@endsection
