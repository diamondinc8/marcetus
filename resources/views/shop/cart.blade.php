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
        <form action="{{ route('order.place') }}" method="POST">
            @csrf
            <div class="row g-0 text-center">
                <div class="col-sm-6 col-md-8">
                    <table class="table mt-3">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <input type="hidden" name="user_id" value={{ $user->id }}>
                                    <input type="hidden" name="status" value="Создан">
                                    <input type="hidden" name="adress" value="{{ $user->address }}">
                                    <input class="form-check-input" type="checkbox" name="product_id[]"
                                        value={{ $cart->product_id }} @checked(true)>
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
                        <button type="sumbit" class="btn btn-primary">Заказать</button>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
@endsection
