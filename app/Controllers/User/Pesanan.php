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
        $data['tgl'] = $this->request->getGet('tgl');
        $data['time'] = $this->request->getGet('time');
        d($data);
        return view('User/BookingView');
    }
    public function pilihwaktu()
    {
        helper('number');
        $paketmodel = new  PaketModel();
        $terpilih = $paketmodel->find($this->request->getGet('paket'));
        if (!$terpilih || $this->request->getGet('paket')==null) {
            return  redirect()->to('/pricelist');
        }
        $timepilih =date('Y-m-d', strtotime('+ 1 days', strtotime(date('Y-m-d'))));

        if ($this->request->getGet('tgl') != null) {
            $tmptime = date('Y-m-d', strtotime($_GET['tgl']));

            ///tidak bisa memiliki masa lalu
            if ($timepilih <= $tmptime) {
                $timepilih = $tmptime;
            }
        }
      //  $terpilih =  $this->request->getGet('tgl') ?? date('Y-m-d');

        $data['tgl'] =$timepilih;
        $_SESSION['paket'] = $this->request->getGet('paket');     
        $data['terpilih'] = $terpilih;
               return view('User/PilihwaktuView', $data);
    }
}
