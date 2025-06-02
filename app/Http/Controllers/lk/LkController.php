<?php

namespace App\Http\Controllers\lk;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LkController extends Controller
{
    public function __invoke()
    {
        $user = User::find(Auth::id());

        $userOrders = Orders::where('user_id', $user->id)->get();

        $products = Product::all();

        return view('shop.lk', compact('user', 'userOrders', 'products'));
    }
}
