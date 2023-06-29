<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\PembayaranModel;

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
    public function tabel_booking()
    {
        $model = new BookingModel();
        $lists = $model->getDatatables();
        $data = [];
        $no = $this->request->getPost('start');
        foreach ($lists as $list) {
            $no++;
            $row = [];
            $paket = $list->paket();
            $row[] =  date('d F Y H:i', strtotime($list->tgl_pesan));
            $row[] = '<a href="' . $list->PenikikPemesan()->linkwa() . '" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-whatsapp fa-lg" style="color: #00ff80;"></i>  ' . $list->PenikikPemesan()->userfullname . '</a>';
            $row[] = "$paket->name $paket->jenis <br> <small> $paket->keterangan <small>";
            $row[] = date('d F Y H:i', strtotime($list->tgl_booking_start)) . '<br>sampai<br>' . date('d F Y H:i', strtotime($list->tgl_booking_end));
            $row[] = ($list->qty_peserta == 0) ? '-' : $list->qty_peserta;

            $row[] = number_to_currency($list->Total_harga, 'idr', 'id_ID');
            // $row[] = number_to_currency($list->terbayar() ?? 0, 'idr', 'id_ID');
            $row[] = $list->status;
            $aksi = '<form method="post"   action="' . base_url("admin/booking/$list->id/setuju") . '">'
                . '<button type="submit" onclick="if (confirm(\'Setuju dengan ini\')) return true; else return false;" class="btn mt-1 mx-1 btn-outline-secondary">'
                . '<i class="fa-regular fa-circle-check"></i>Approve'
                . ' </button> '
                . '</form>';
            $aksi .= '<form method="post"   action="' . base_url("admin/booking/$list->id/batal") . '">'
                . '<button type="submit" onclick="if (confirm(\'Yakin akan Menolak\')) return true; else return false;" class="btn mt-1 mx-1 btn-outline-danger">'
                . '<i class="fa-regular fa-circle-xmark"></i> Tolak'
                . ' </button> '
                . '</form>';


            $row[] = ($list->status == 'Menunggu Persetujuan') ? $aksi : '';
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
    public function  tabel_pembayaran()
    {
        $model = new BookingModel();
        $lists = $model->getDatatables();
        $data = [];
        $no = $this->request->getPost('start');
        foreach ($lists as $list) {
            $no++;
            $row = [];
            $paket = $list->paket();
            $row[] =  date('d F Y H:i', strtotime($list->tgl_pesan));
            $row[] = '<a href="' . $list->PenikikPemesan()->linkwa() . '" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-whatsapp fa-lg" style="color: #00ff80;"></i>  ' . $list->PenikikPemesan()->userfullname . '</a>';
            $row[] = "$paket->name $paket->jenis <br> <small> $paket->keterangan <small>";
            $row[] = date('d F Y H:i', strtotime($list->tgl_booking_start)) . '<br>sampai<br>' . date('d F Y H:i', strtotime($list->tgl_booking_end));
            //$row[] = ($list->qty_peserta == 0) ? '-' : $list->qty_peserta;

            $row[] = number_to_currency($list->Total_harga, 'idr', 'id_ID');
            $row[] = number_to_currency($list->terbayar() ?? 0, 'idr', 'id_ID');
            $row[] = $list->status;
            $aksi = '<button type="submit" onclick="tampilbukti(\'' . $list->id . '\')" class="btn mt-1 mx-1 btn-outline-secondary">'
                . '<i class="fa-regular fa-circle-check"></i>Approve'
                . ' </button> ';


            $row[] = ($list->status == 'Menunggu konfirmasi Pembayaran') ? $aksi : '';
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


    public function booking_setuju($id)
    {
        $model = new BookingModel();
        $booking = $model->find($id);
        if (!$booking) {
            return redirect()->to(base_url("admin/booking"))->with('message', 'tidak ditemukan atau sudah terhapus');
        }
        if ($booking->status != "Menunggu Persetujuan") {
            return redirect()->to(base_url("admin/booking"))->with('message', 'pesanan ini tidak Menunggu Persetujuan');
        }
        $model->update($id, ["status" => "Menunggu Pembayaran"]);
        return redirect()->to(base_url("admin/booking"))->with('message', "pesanan " .   $booking->PenikikPemesan()->userfullname . " Menunggu Pembayaran");
    }

    public function booking_batal($id)
    {
        $model = new BookingModel();
        $booking = $model->find($id);
        if (!$booking) {
            return redirect()->to(base_url("admin/booking"))->with('message', 'tidak ditemukan atau sudah terhapus');
        }
        if ($booking->status != "Menunggu Persetujuan") {
            return redirect()->to(base_url("admin/booking"))->with('message', 'pesanan ini tidak Menunggu Persetujuan');
        }
        $model->update($id, ["status" => "Permintaan ditolak"]);
        return redirect()->to(base_url("admin/booking"))->with('message', "pesanan " .   $booking->PenikikPemesan()->userfullname . " ditolak");
    }
    public function tampilpembayarna($id)
    {
        $pembayaranmodel = new PembayaranModel();
        $data['pembayaran'] = $pembayaranmodel->where('booking_id', $id);
        return view('Admin/bayarView', $data);
    }
}
