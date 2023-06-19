<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Testimoni extends BaseController
{
    public function index()
    {
        return view('Admin/TestimoniView');
    }
}
