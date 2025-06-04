<?php

namespace App\Http\Controllers\Seller\Order;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Seller;
use App\Models\UserOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewOrderController extends Controller
{
    public function __invoke()
    {
        $seller_id = Seller::where('founder_id', Auth::id())->first()->id;
        //Быстро получить id
        $seller_products_ids = Product::where('seller_id', $seller_id)->pluck('id');

        //Как быстро получить все объекты, если их элемент (в этом случае product_id) есть в массиве 
        // (в этом случае $seller_products_ids)
        $ordered_seller_products = Orders::whereIn('product_id', $seller_products_ids)->get();

        // Все продукты селлера
        $seller_products = Product::where('seller_id', $seller_id)->get();


        //dd($ordered_products);
        // $ordered_products = UserOrders:://как получить именно те "заказы", где "product_id" находится в массиве $seller_products в id
        return view('seller.orders.new_orders', compact('ordered_seller_products', 'seller_products'));
    }
}
