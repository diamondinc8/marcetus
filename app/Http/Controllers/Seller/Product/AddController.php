<?php

namespace App\Http\Controllers\Seller\Product;

use App\Http\Controllers\Controller;

class AddController extends Controller
{
    public function __invoke()
    {

        return view('seller.product.add');
    }
}
