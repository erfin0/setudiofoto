<?php

namespace App\Controllers\User;

use App\Models\BookingModel;
use App\Models\PaketModel;
use App\Entities\Booking;
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
        if ($data['tgl'] == null ||  $data['time'] == null) {
            return  redirect()->to('/pilihwaktu');
        }
        return view('User/BookingView', $data);
    }


    public function pilihwaktu()
    {
        helper('number');
        $paketmodel = new  PaketModel();
        $terpilih = $paketmodel->find($this->request->getGet('paket'));
        if (!$terpilih || $this->request->getGet('paket') == null) {
            return  redirect()->to('/pricelist');
        }
        $timepilih = date('Y-m-d', strtotime('+ 1 days', strtotime(date('Y-m-d'))));

        if ($this->request->getGet('tgl') != null) {
            $tmptime = date('Y-m-d', strtotime($_GET['tgl']));

            ///tidak bisa memiliki masa lalu
            if ($timepilih <= $tmptime) {
                $timepilih = $tmptime;
            }
        }

        $data['waktuterboking'] = $this->listwaktu($timepilih);
        $data['tgl'] = $timepilih;
        $_SESSION['paket'] = $this->request->getGet('paket');
        $data['terpilih'] = $terpilih;
        d($data);
        return view('User/PilihwaktuView', $data);
    }
    private function waktudiizinkan($datetime) 
    {
        $modelboking = new BookingModel();
        $data  = $modelboking
        ->where('DATE(tgl_pesan)',date("Y-m-d", strtotime($datetime)))
        ->where('TIME(tgl_booking_start)<=',date("H:i:s", strtotime($datetime)))
        ->where('TIME(tgl_booking_end) >=', date("H:i:s", strtotime($datetime)))
        ->countAllResults();
        return ($data);
    }
    private function listwaktu($datetime)
    {
        $data = [];
        for ($i = 0; $i <= 12; $i++) {
            $val = date('Y-m-d H:i:s', strtotime($datetime . "+8 hours +" . ($i * 60) . " minutes"));
            $data[] = [
                'time'=>$val,
                 'bool'=> $this->waktudiizinkan($val),
            ];
        }
        return $data;
    }


    public function create_booking()
    {

        $rules = [
            'qty_peserta' => 'permit_empty|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $booking = new Booking();
        $model = new BookingModel();

        $data = [
            'paket_id' => $this->request->getPost('paket_id'),
            'users_id' => auth()->getUser()->id,
            'tgl_pesan' => $this->request->getPost('tgl_pesan'),
            //'status',
            'qty_peserta' => $this->request->getPost('qty_peserta'),
            //'Total_harga',
            //'tgl_booking_start',
            //'tgl_booking_end',
        ];
        $booking->fill($data);

        $model->save($booking);

        return redirect()->to(base_url("booking"))->with('message', 'tersimpan');
    }
}
