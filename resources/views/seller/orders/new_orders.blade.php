@extends('seller.orders.layouts.orders')
@section('title')
    Новые заказы
@endsection

@section('seller')
    партнер
@endsection

@section('content')
    <form action="" method="POST">
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Передать на сборку</button>
        </div>
        <table class="table mt-3">
            <tbody>
                @foreach ($ordered_seller_products as $ordered_seller_product)
                    <tr>
                        <th scope="row">
                            <input class="form-check-input" type="checkbox" name="product_id[]"
                                value="{{ $ordered_seller_product->id }}">
                        </th>
                        <td>{{ $seller_products->find($ordered_seller_product->product_id)->title }}</td>
                        <td>{{ $ordered_seller_product->adress }}</td>
                        <td>{{ $ordered_seller_product->id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
@endsection
