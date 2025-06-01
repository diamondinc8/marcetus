@extends('shop.layouts.main')

@section('title')
    Корзина
@endsection

@section('content')
    @csrf
    @php
        $sum = 0;
    @endphp
    @foreach ($cartList as $cart)
        @php
            $product = $products->find($cart->product_id);
            $sum += $product->cost;
        @endphp
        <form action="" method="POST">
            <div class="row g-0 text-center">
                <div class="col-sm-6 col-md-8">
                    <table class="table mt-3">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <input type="checkbox" name="{{ $cart->product_id }}">
                                </th>
                                <td>{{ $products->find($cart->product_id)->title }}</td>
                                <td>ЗДЕСЬ СДЕЛАТЬ КОЛИЧЕСТВО</td>
                                <td>{{ $products->find($cart->product_id)->cost }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-6 col-md-4">
                    <div>
                        <p>Доставка по адресу:</p>
                        <p>{{ $user->address }}</p>

                        <p>Итого: {{ $sum }}</p>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
@endsection
