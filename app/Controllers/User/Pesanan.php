<?php

namespace App\Controllers\User;
use App\Models\PaketModel;
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
    public function pilihwaktu()
    {
        helper('number');
        $paketmodel= new  PaketModel();
        $terpilih= $paketmodel->find( $this->request->getGet('paket'));
        if (!$terpilih){
            return  redirect()->to('/pricelist');
        }
        $data['terpilih']=$terpilih;
        
        return view('User/PilihwaktuView',$data);
    }
}
