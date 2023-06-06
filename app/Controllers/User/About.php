<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        helper('imgd');
        return view('User/AboutView');
    }
}
