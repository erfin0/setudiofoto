<?php

namespace App\Controllers\User;

use App\Models\BookingModel;
use App\Models\PaketModel;
use App\Models\PembayaranModel;
use App\Entities\Pembayaran;
use App\Entities\Booking;
use App\Controllers\BaseController;


class Pesanan extends BaseController
{
    public function index()
    {
        return view('User/PesananView');
    }
    public function pembayaran($id)
    {
        $model = new BookingModel();
        $pembayaran = $model->where('users_id', auth()->getUser()->id)->find($id);
        if (!$pembayaran) {
            return redirect()->to(base_url("transaksi"))->with('message', 'Pembayaran tidak ditemukan');
        }
        if ($pembayaran->status == "lunas") {
            return redirect()->to(base_url("transaksi"))->with('message', 'Pembayaran sudah lunas tidak perlu dibayar');
        }
        if ($pembayaran->status == "batal") {
            return redirect()->to(base_url("transaksi"))->with('message', 'Pembayaran sudah dibatalkan');
        }
        $data['pesanan'] = $pembayaran;

        return view('User/PembayaranView', $data);
    }
    public function testimoni_new($id)
    {
        $model = new BookingModel();
        $booking = $model->find($id);
        if (!$booking) {
            return redirect()->to(base_url("transaksi"))->with('message', 'pesanan tidak ditemukan');
        }
        return view('User/TestimoniAddView');
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
   /*  private function waktudiizinkan($datetime): bool
    {
        $modelboking = new BookingModel();
        $data  = $modelboking
            ->where('DATE(tgl_pesan)', date("Y-m-d", strtotime($datetime)))
            ->where('TIME(tgl_booking_start)<=', date("H:i:s", strtotime($datetime)))
            ->where('TIME(tgl_booking_end) >=', date("H:i:s", strtotime($datetime)))
            //  ->where("status <>'batal'")
            ->whereNotIn('status', ['Permintaan ditolak', 'batal'])
            ->countAllResults();
        return ($data > 0);
    } */
    private function listwaktu($datetime)
    {
        $model = new BookingModel();
        $data = [];
        for ($i = 0; $i <= 12; $i++) {
            $val = date('Y-m-d H:i:s', strtotime($datetime . "+8 hours +" . ($i * 60) . " minutes"));
            $data[$val] =  $model->waktudiizinkan($val);
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

        if (! $model->waktudiizinkan($this->request->getPost('tgl_pesan'))){
            return redirect()->back()->withInput()->with('errors', ['tgl_pesan'=>"tanggal ini sudah terpakai"]);
        }

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
            $batal = '<form method="post"   action="' . base_url("transaksi/$list->id/batal") . '">  <button type="submit" onclick="if (confirm(\'Yakin akan membatalkan\')) return true; else return false;" class="btn mt-1 mx-1 btn-outline-danger"> <i class="fa-solid fa-ban"></i> Batal</button> </form>';
            $paket = $list->paket();
            $row = [];
            $row[] = date('d F Y H:i', strtotime($list->tgl_pesan));
            $row[] = "$paket->name $paket->jenis <br> <small> $paket->keterangan <small>";
            $row[] = $list->status;
            $row[] = $list->code;
            $row[] = number_to_currency($list->Total_harga, 'idr', 'id_ID') .'/ terbayar '.number_to_currency($list->terbayar() ?? 0, 'idr', 'id_ID');
           
            $aksi = (in_array($list->status, ['Menunggu Pembayaran', 'Bukti pembayaran ditolak','Belum lunas'])) ?  '<a class="btn mt-1 mx-1 btn-light" href="'
                . base_url("transaksi/$list->id/pembayaran")
                . '" role="button"> <i class="fa-solid fa-money-bill"></i> Bayar</a>' : '';
            $aksi .= (in_array($list->status, ['Menunggu Persetujuan', 'Menunggu Pembayaran'])) ? $batal : '';
            $testi = '<a class="btn btn-light" href="' . base_url("booking/$list->id/testimoni") . '" role="button">Testimoni</a>';
            $row[] = $aksi;
            $row[] = (in_array($list->status, ["lunas", "selesai"])) ? $testi : '';
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

    public function batal_transaksi($id)
    {
        $model = new BookingModel();
        $pembayaran = $model->where('users_id', auth()->getUser()->id)->find($id);
        if (!$pembayaran) {
            return redirect()->to(base_url("transaksi"))->with('message', 'tidak ditemukan atau sudah terhapus');
        }
        if ($pembayaran->status == "lunas") {
            return redirect()->to(base_url("transaksi"))->with('message', 'Pembayaran sudah lunas tidak bisadibatalkan');
        }
        $model->update($id, ["status" => "batal"]);
        return redirect()->to(base_url("transaksi"))->with('message', "pesanan tanggal $pembayaran->tgl_pesan telah dibatalkan");
    }
    public function bayar_transaksi($id)
    {
        $model = new BookingModel();
        $pembayaran = $model->where('users_id', auth()->getUser()->id)->find($id);
        if (!$pembayaran) {
            return redirect()->to(base_url("transaksi"))->with('message', 'tidak ditemukan atau sudah terhapus');
        }
        if ($pembayaran->status == "lunas") {
            return redirect()->to(base_url("transaksi"))->with('message', 'Pembayaran sudah dilunasi');
        }

        $rules = [
            'jenis' => 'in_list[Dp,Lunas]',
            'image' => 'uploaded[image]'
                . '|is_image[image]'
                . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                . '|max_size[image,5000]'
                . '|max_dims[image,6920,6080]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $modelbayar = new PembayaranModel();
        $data = [
            'booking_id' => $id,
            'nominal'=> $this->request->getPost('nominal'),
            'bukti' => $this->simpan_img('image'),
            'jenis' => $this->request->getPost('jenis'),
        ];
        $modelbayar->insert($data);

        $model->update($id, ["status" => "Menunggu konfirmasi Pembayaran"]);
        return redirect()->to(base_url("transaksi"))->with('message', "pesanan tanggal $pembayaran->tgl_pesan menunggu konfirmasi dari admin");
    }
    private function simpan_img($files)
    {
        $dataBerkas = $this->request->getFile($files);
        if (!empty($dataBerkas)) {
            if ($dataBerkas->getName() !== "") {
                $path = FCPATH . '/uploads/buktitf/';
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                $fileName = $dataBerkas->getRandomName();
                $dataBerkas->move($path, $fileName);
                $data['img'] =  $fileName;
                return $fileName;
            }
        }
        return "";
    }
}
