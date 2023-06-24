<?php

namespace App\Controllers\User;
use App\Models\PaketModel;
use App\Controllers\BaseController;

class Pricelist extends BaseController
{
    public function index()
    {
        helper('number');
        $paketmodel= new  PaketModel();
        $data['paket']= $paketmodel->findAll() ;
        $data['best']= $paketmodel->findAll(3);
        return view('User/PricelistView',$data);
    }
}
