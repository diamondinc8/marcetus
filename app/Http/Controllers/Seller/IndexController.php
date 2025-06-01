<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $userId = Auth::id();
        $isSeller = Seller::where('founder_id', $userId)->exists();
        $sellerTitle = Seller::where('founder_id', $userId)->first()->title;

        if ($isSeller) {
            return view('seller.index', compact('sellerTitle'));
        } else {
            return view('seller.registration');
        }
    }
}
