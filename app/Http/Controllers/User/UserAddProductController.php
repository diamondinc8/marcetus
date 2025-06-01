<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserCart;
use Illuminate\Http\Request;

class UserAddProductController extends Controller
{
    public function __invoke($user, $product)
    {
        $data = [
            'user_id' => $user,
            'product_id' => $product
        ];

        UserCart::firstOrCreate($data);

        return redirect()->route('index');
    }
}
