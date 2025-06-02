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

    <div class="bg-body rounded w-100 p-4 mt-3">
        <div>
            <p>Доствки:</p>
            @if (count($userOrders) != 0)
                @foreach ($userOrders as $userOrder)
                    {{ $userOrder->product_id }}
                    <!-- ПОТОМ ДОБАВИТЬ КАРТОЧКИ! -->
                @endforeach
            @else
                <div class="text-center">
                    <p>Пока нет доставок</p>
                    <a href="{{ route('index') }}" class="btn btn-primary">Перейти в каталог</a>
                </div>
            @endif
        </div>
    </div>
@endsection
