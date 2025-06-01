<?php

namespace App\Services\Seller;

use App\Models\Seller;

class Service
{
    public function registration($data)
    {
        Seller::create($data);
    }
}
