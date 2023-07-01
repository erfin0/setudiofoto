<?php

namespace App\Controllers\User;
use App\Models\PortofolioModel;
use App\Controllers\BaseController;

class Portofolio extends BaseController
{
    public function index()
    {
        $potomodel= new  PortofolioModel();     
        $data['poto']= $potomodel->getrandom(6);
        $data['potohider']= $potomodel->getrandom(6);
        return view('User/portofolioView',$data);
    }
}
