@extends('shop.layouts.main')

@section('title')
    Интернет-магазин Маркетус
@endsection

@section('content')
    <div class="container py-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card position-relative h-100">
                        <img src="..." class="card-img-top" alt="Изображение">
                        <div class="card-body">
                            <h6 class="card-title">{{ $product->cost }} ₽</h6>
                            <p class="card-text small">
                                {{ $sellerList->find($product->seller_id)->title }}/ {{ $product->title }}
                            </p>
                            <div class="rating">Здесь количество оценок</div>
                            @auth
                                <a href="{{ route('product.add', ['user' => Auth::id(), 'product' => $product]) }}"
                                    class="btn btn-primary w-100 mt-2">Заказать</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100 mt-2">Войти для заказа</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
