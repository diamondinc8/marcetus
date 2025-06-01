<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellerRegistrationRequest;
use App\Models\Seller;
use Illuminate\Http\Request;

class RegistrationController extends BaseController
{
    public function __invoke(SellerRegistrationRequest $request)
    {
        $data = $request->validated();

        $this->service->registration($data);

        return redirect()->route('seller.index');
    }
}
