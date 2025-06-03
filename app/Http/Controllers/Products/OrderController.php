<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Products\BaseController;
use App\Http\Requests\OrderRequest;
use App\Models\UserCart;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function __invoke(OrderRequest $request)
    {


        $data = $request->validated();

        $order = [
            'user_id' => $data['user_id'],
            'status' => $data['status'],
            'adress' => $data['adress'],
            'product_id' => ''
        ];


        foreach ($data['product_id'] as $product_id) {
            $cartObject = UserCart::where('user_id', $order['user_id'])->where('product_id', $product_id)->first();
            UserCart::destroy($cartObject->id);
            $order['product_id'] = $product_id;
            $this->service->placeOrder($order);
        }

        return redirect()->route('lk.index');
    }
}
