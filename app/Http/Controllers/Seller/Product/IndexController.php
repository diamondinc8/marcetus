<?php

namespace App\Http\Controllers\Seller\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('seller.product.cards');
    }
}
