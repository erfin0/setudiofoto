<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookingModel;
class Pesanan extends BaseController
{
    public function index()
    {
        //
    }
    public function booking()
    {
        return view('Admin/BookingView');
    }
    public function pembayaran()
    {
        return view('Admin/PembayaranView');
    }
    public function tabel_booking(){

        $model = new BookingModel();
        $lists = $model->getDatatables();
        $data = [];
        $no = $this->request->getPost('start');
        foreach ($lists as $list) {
            $no++;
            $row = [];
            $row[] = '<img src="' . $list->ximage('mini') . '"  style="height: 50px;">'  . $list->judul;
            $row[] = $list->keterangan;
            $row[] = '<a class="btn mt-1 mx-1 btn-light" href="'
                . base_url("admin/portofolio/$list->id/edit")
                . '" role="button"> <i class="fa-solid fa-pen-to-square"></i></a>'
                .'<button class="btn mt-1 mx-1 btn-outline-danger" onclick="del('.$list->id.')"> <i class="fa-solid fa-trash-can"></i></button>';
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
