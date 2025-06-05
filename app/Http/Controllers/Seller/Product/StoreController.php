<?php

namespace App\Http\Controllers\Seller\Product;

use App\Http\Requests\ProductRequest;

class StoreController extends BaseController
{
    public function __invoke(ProductRequest $request)
    {
        $data = $request->validated();

        $this->service->addProduct($data);
    }
}
