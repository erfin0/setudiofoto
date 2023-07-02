<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\PembayaranModel;
use App\Models\PaketModel;
use App\Entities\Booking;

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
    public function booking_new()
    {
        $paketmodel = new PaketModel();
        $data['paket'] = $paketmodel->findAll();
        d($data);
        return view('Admin/BookingNewView', $data);
    }
    public function create()
    {
        $booking = new Booking();
        $model = new BookingModel();
        $rules = [
            'qty_peserta' => 'permit_empty|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        if (!$model->waktudiizinkan($this->request->getPost('tgl_pesan'))) {
            return redirect()->back()->withInput()->with('errors', ['tgl_pesan' => "tanggal ini sudah terpakai"]);
        }


        $data = [
            'paket_id' => $this->request->getPost('paket_id'),
            'users_id' =>  $this->request->getPost('users_id'),
            'tgl_pesan' => $this->request->getPost('tgl_pesan'),
            'status' => 'Menunggu Pembayaran', //'Menunggu Persetujuan',
            'qty_peserta' => $this->request->getPost('qty_peserta'),
            //'Total_harga',
            //'tgl_booking_start',
            //'tgl_booking_end',
            'keterangan' => $this->request->getPost('keterangan'),
        ];
        $booking->fill($data);

        $model->save($booking);

        return redirect()->to(base_url("admin/booking"))->with('message', 'tersimpan');
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

            $row[] = number_to_currency($list->Total_harga, 'idr', 'id_ID').'/ terbayar '.number_to_currency($list->terbayar() ?? 0, 'idr', 'id_ID');
            // $row[] = number_to_currency($list->terbayar() ?? 0, 'idr', 'id_ID');
            $row[] = $list->status;
            $row[] = $list->keterangan;
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

            $bayarx = '<a class="btn outline-secondary" href="' . base_url("admin/booking/$list->id/pembayaran") . '" role="button"><i class="fa-solid fa-money-bill"></i></a>';

            $row[] = ( $list->status == 'Menunggu Persetujuan') ? $aksi : ((in_array(  $list->status, ['Menunggu Pembayaran', "Belum lunas" ])) ? $bayarx   : '');
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
        // $model = new BookingModel();
        $model = new PembayaranModel();
        $lists = $model->getDatatables();
        $data = [];
        $no = $this->request->getPost('start');
        foreach ($lists as $listx) {
            $no++;
            $row = [];
            $list = $listx->booking();
            $paket = $list->paket();
            $row[] =  date('d F Y H:i', strtotime($listx->created_at));
            $row[] = '<a href="' . $list->PenikikPemesan()->linkwa() . '" target="_blank" rel="noopener noreferrer"> <i class="fa-brands fa-whatsapp fa-lg" style="color: #00ff80;"></i>  ' . $list->PenikikPemesan()->userfullname . '</a>';
            $row[] = "$paket->name $paket->jenis <br> <small> $paket->keterangan <small>";
            //$row[] = ($list->qty_peserta == 0) ? '-' : $list->qty_peserta;

            $row[] = number_to_currency($list->Total_harga, 'idr', 'id_ID') .'/ terbayar '.number_to_currency($list->terbayar() ?? 0, 'idr', 'id_ID');
            /*   $row[] = number_to_currency($list->terbayar() ?? 0, 'idr', 'id_ID'); */
            $row[] = $listx->setuju ?? 'menunggu';

            $row[] = '<img id="avatar" onclik src="' . $listx->ximage() . '" style="max-width: 95%;height: auto;width: 10rem;object-fit: cover;" alt="">';
            $row[] = number_to_currency($listx->nominal ?? 0, 'idr', 'id_ID');
            /*     $aksi = '<a type="submit" href="' . base_url("admin/pembayaran/$list->id") . '"   class="btn mt-1 mx-1 btn-outline-secondary">'
                . '<i class="fa-regular fa-circle-check"></i>Approve'
                . ' </a> '; */

            $aksi = '<form method="post"   action="' . base_url("admin/pembayaran/$listx->id/setuju") . '">'
                . '<button type="submit" onclick="if (confirm(\'Setuju dengan ini\')) return true; else return false;" class="btn mt-1 mx-1 btn-outline-secondary">'
                . '<i class="fa-regular fa-circle-check"></i>Approve'
                . ' </button> '
                . '</form>';
            $aksi .= '<form method="post"   action="' . base_url("admin/pembayaran/$listx->id/tolak") . '">'
                . '<button type="submit" onclick="if (confirm(\'Yakin akan Menolak\')) return true; else return false;" class="btn mt-1 mx-1 btn-outline-danger">'
                . '<i class="fa-regular fa-circle-xmark"></i> Tolak'
                . ' </button> '
                . '</form>';
            $row[] = ($listx->setuju == null) ? $aksi : '';
            //  $row[] = ($list->status == 'Menunggu konfirmasi Pembayaran') ? $aksi : '';
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
    public function pembayarna_setuju($id)
    {
        $pembayaranmodel = new PembayaranModel();
        $model = new BookingModel();
        $bayar = $pembayaranmodel->find($id);

        $pembayaranmodel->update($id, ["setuju" => "disetujui"]);
        $adacode=$model->find($bayar->booking_id) ;
        $datar["status"]= ($bayar->jenis == 'Dp') ? "Belum lunas" : "lunas";
        if ($adacode->code==''){
            $datar["code"] = 'odr-' . uniqid();
        }
        $model->update($bayar->booking_id, $datar);
        return redirect()->to(base_url("admin/pembayaran"))->with('message', "Pembayaran disetujui");
    }
    public function pembayarna_tolak($id)
    {
        $pembayaranmodel = new PembayaranModel();
        $model = new BookingModel();
        $bayar = $pembayaranmodel->find($id);
        $pembayaranmodel->update($id, ["setuju" => "ditolak"]);
        $model->update($bayar->booking_id, ["status" => "Bukti pembayaran ditolak"]);
        return redirect()->to(base_url("admin/pembayaran"))->with('message', "Pembayaran ditolak Menunggu Pembayaran");
    }

    public function booking_pembayaran($id)
    {
        $model = new BookingModel();
        $pembayaran = $model->find($id);
        if (!$pembayaran) {
            return redirect()->to(base_url("admin/booking"))->with('message', 'Pembayaran tidak ditemukan');
        }
        if ($pembayaran->status == "lunas") {
            return redirect()->to(base_url("admin/booking"))->with('message', 'Pembayaran sudah lunas tidak perlu dibayar');
        }
        if ($pembayaran->status == "batal") {
            return redirect()->to(base_url("admin/booking"))->with('message', 'Pembayaran sudah dibatalkan');
        }
        $data['pesanan'] = $pembayaran;

        return view('Admin/PembayaranaddView', $data);
    }

    public function booking_pembayaran_pos($id)
    {
        $model = new BookingModel();
        $pembayaran = $model->find($id);
        if (!$pembayaran) {
            return redirect()->to(base_url("admin/booking"))->with('message', 'tidak ditemukan atau sudah terhapus');
        }
        if ($pembayaran->status == "lunas") {
            return redirect()->to(base_url("admin/booking"))->with('message', 'Pembayaran sudah dilunasi');
        }
        if ($pembayaran->status == "batal") {
            return redirect()->to(base_url("admin/booking"))->with('message', 'Pembayaran sudah dibatalkan');
        }

        $rules = [
            'jenis' => 'in_list[Dp,Lunas]',
            'image' => 'permit_empty|uploaded[image]'
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
            'nominal' => $this->request->getPost('nominal'),
            // 'bukti' => $this->simpan_img('image'),
            'jenis' => $this->request->getPost('jenis'),
            'setuju' => 'disetujui',

        ];
        if ($this->request->getPost('image') != '') {
            $data['bukti'] = $this->simpan_img('image');
        }
        $modelbayar->insert($data);

        $datar["status"]= ($this->request->getPost('jenis') == 'Dp') ? "Belum lunas" : "lunas";
        if ($pembayaran->code==''){
            $datar["code"] = 'odr-' . uniqid();
        }
       
        $model->update($id, $datar);
        return redirect()->to(base_url("admin/booking"))->with('message', "pesanan tanggal $pembayaran->tgl_pesan menunggu konfirmasi dari admin");
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
        $data['pembayaran'] = $pembayaranmodel->where(['booking_id' => $id, 'setuju' => null])->findAll(1);
        $data['id'] = $id;
        return view('Admin/bayarView', $data);
    }
    public function savepembayarna()
    {
        $pembayaranmodel = new PembayaranModel();
        $id = $this->request->getPost('id');
        $stuju = ($this->request->getPost('setuju') !== null) ? 'setuju' : 'ditolak';
        $pembayaranmodel->where('id', $id)->update([
            'nominal' => $this->request->getPost('nominal'),
            'setuju' => ($this->request->getPost('setuju') !== null),
        ]);
        $idboking = $this->request->getPost('idboking');
        $model = new BookingModel();
        // $model->update($data, ['id' => $idboking]);
        /* nominal id  setuju*/
    }
}
