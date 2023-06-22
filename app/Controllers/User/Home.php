<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
 
use App\Models\PortofolioModel;

class Home extends BaseController
{
    public function index()
    {
        $potomodel= new  PortofolioModel();
        $data['poto']= $potomodel->getrandom(6);
        $data['potohider']= $potomodel->getrandom(6);
        return view('User/HomeView',$data);
    }
}
