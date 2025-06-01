<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        $cartList = UserCart::where('user_id', $user->id)->get();
        $products = Product::all();
        return view('shop.cart', compact('cartList', 'products', 'user'));
    }
}
