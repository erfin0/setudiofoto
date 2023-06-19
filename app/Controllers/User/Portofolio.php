<?php

namespace App\Controllers\User;
use App\Models\PortofolioModel;
use App\Controllers\BaseController;

class Portofolio extends BaseController
{
    public function index()
    {
        $s= new PortofolioModel();
        $data['poto']=[];// $s->getrandom(10) ;
        return view('User/portofolioView',$data);
    }
}
