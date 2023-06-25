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
        $paketmodel = new  PaketModel();
        $terpilih = $paketmodel->find($this->request->getGet('paket'));
        if (!$terpilih) {
            return  redirect()->to('/pricelist');
        }
        $timepilih = date('Y-m-d');

        if ($this->request->getGet('stime') != null) {
            $tmptime = date('Y-m-d', strtotime($_GET['stime']));

            ///tidak bisa memiliki masa lalu
            if ($timepilih <= $tmptime) {
                $timepilih = $tmptime;
            }
        }
      //  $terpilih =  $this->request->getGet('stime') ?? date('Y-m-d');

        $data['stime'] =$timepilih;
        $_SESSION['paket'] = $this->request->getGet('paket');     
        $data['terpilih'] = $terpilih;
        d($data);
        return view('User/PilihwaktuView', $data);
    }
}
