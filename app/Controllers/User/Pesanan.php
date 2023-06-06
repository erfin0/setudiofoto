<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Pesanan extends BaseController
{
    public function index()
    {
        //
    }
    public function pembayaran()
    {
        return view('User/PembayaranView');
    }
    public function booking()
    {
        return view('User/BookingView');
    }
}
