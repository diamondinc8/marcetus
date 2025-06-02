<?php

namespace App\Services\Product;

use App\Models\Orders;
use App\Models\Product;

class Service
{
    public function placeOrder($data)
    {
        Orders::create($data);
    }
}
