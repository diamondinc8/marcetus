<?php

namespace App\Http\Controllers\Seller\Product;

use App\Http\Controllers\Controller;
use App\Services\Seller\Product\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
