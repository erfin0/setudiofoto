<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pesanan extends BaseController
{
    public function index()
    {
        //
    }
    public function booking()
    {
        return view('Admin/BookingView');
    }
    public function pembayaran()
    {
        return view('Admin/PembayaranView');
    }
}
