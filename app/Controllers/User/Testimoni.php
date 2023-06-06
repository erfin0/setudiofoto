<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Testimoni extends BaseController
{
    public function index()
    {
       
        return view('User/TestimoniView');
    }
}
