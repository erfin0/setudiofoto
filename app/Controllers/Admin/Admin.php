<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {   
        $userModel = model(UserFilter::class);     
        $data['admin'] = $userModel->filter(['role' =>['admin']])->findAll();
        return view('Admin/AdminView',$data);
    }
    public function new()
    {          
        return view('Admin/AdminaddView');
    }
}
