<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();
        $sellerList = Seller::all();
        $a = 0;
        return view('shop.index', compact('products', 'sellerList', 'a'));
    }
}
