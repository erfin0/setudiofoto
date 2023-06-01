<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Pricelist extends BaseController
{
    public function index()
    {  return view('User/PricelistView');
    }
}
