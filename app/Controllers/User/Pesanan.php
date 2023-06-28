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
        return view('User/PesananView');
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
        return view('User/PilihwaktuView', $data);
    }
    private function waktudiizinkan($datetime): bool
    {
        $modelboking = new BookingModel();
        $data  = $modelboking
            ->where('DATE(tgl_pesan)', date("Y-m-d", strtotime($datetime)))
            ->where('TIME(tgl_booking_start)<=', date("H:i:s", strtotime($datetime)))
            ->where('TIME(tgl_booking_end) >=', date("H:i:s", strtotime($datetime)))
            ->countAllResults();
        return ($data > 0);
    }
    private function listwaktu($datetime)
    {
        $data = [];
        for ($i = 0; $i <= 12; $i++) {
            $val = date('Y-m-d H:i:s', strtotime($datetime . "+8 hours +" . ($i * 60) . " minutes"));
            $data[$val] =  $this->waktudiizinkan($val);
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
            'status' => 'Menunggu Pembayaran',
            'qty_peserta' => $this->request->getPost('qty_peserta'),
            //'Total_harga',
            //'tgl_booking_start',
            //'tgl_booking_end',
        ];
        $booking->fill($data);

        $model->save($booking);

        return redirect()->to(base_url("transaksi"))->with('message', 'tersimpan');
    }

    public function tabel_transaksi()
    {
        $model = new BookingModel();
        $lists = $model->getDatatables();
        $data = [];
        $no = $this->request->getPost('start');
        foreach ($lists as $list) {
            $no++;
            $paket=$list->paket();
            $row = [];
            $row[] = date('d F Y H:i', strtotime($list->tgl_pesan));
            $row[] = "$paket->name $paket->jenis <br> <small> $paket->keterangan <small>";
            $row[] = $list->status;
            $row[] = '<a class="btn mt-1 mx-1 btn-light" href="'
                .base_url("pembayaran/$list->id")
                .'" role="button"> <i class="fa-solid fa-money-bill"></i></a>'
                .'<button class="btn mt-1 mx-1 btn-outline-danger" onclick="del(' . $list->id . ')"> <i class="fa-solid fa-trash-can"></i></button>';
            $data[] = $row;
        }
        $output = [
            'draw' => $this->request->getPost('draw'),
            'recordsTotal' => $model->countAll(),
            'recordsFiltered' => $model->countFiltered(),
            'data' => $data,

        ];
        echo json_encode($output);
    }
}
