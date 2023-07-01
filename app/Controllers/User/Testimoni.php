<?php

namespace App\Controllers\User;

use App\Models\BookingModel;
use App\Models\TestimoniModel;
use App\Controllers\BaseController;

class Testimoni extends BaseController
{
    public function index()
    {

        return view('User/TestimoniView');
    }

    public function boking_testimoni_new($id)
    {
        $model = new BookingModel();
        $pesanan = $model->where('users_id', auth()->getUser()->id)->find($id);
        if (!$pesanan) {
            return redirect()->to(base_url("transaksi"))->with('message', 'tidak ditemukan atau sudah terhapus');
        }
        if (!in_array($pesanan->status, ["lunas", "selesai"])) {
            return redirect()->to(base_url("transaksi"))->with('message', 'Lunasi untuk membuat testimoni');
        }

        return view('User/TestimoniaddView');
    }
    public function  boking_testimoni_create($id)
    {
        $model = new BookingModel();
        $pesanan = $model->where('users_id', auth()->getUser()->id)->find($id);
        if (!$pesanan) {
            return redirect()->to(base_url("transaksi"))->with('message', 'tidak ditemukan atau sudah terhapus');
        }
        if (!in_array($pesanan->status, ["lunas", "selesai"])) {
            return redirect()->to(base_url("transaksi"))->with('message', 'Lunasi untuk membuat testimoni');
        }
        $rules = [
            'keterangan' => 'required|min_length[3]',
            'image' => 'uploaded[image]'
                . '|is_image[image]'
                . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                . '|max_size[image,5000]'
                . '|max_dims[image,6920,6080]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

       
        $Testimonimodal = new TestimoniModel();      
        $data=[           
            'gambar'=> $this->simpan_img('image'),
            'keterangan'=> $this->request->getPost('keterangan'),
            'users_id'=>auth()->getUser()->id,
            'booking_id'=>$id
        ];
        
        $Testimonimodal->insert($data);

        return redirect()->to(base_url("transaksi"))->with('message', 'testimoni tersimpan');
        
    }
    private function simpan_img($files)
    {
        $dataBerkas = $this->request->getFile($files);
        if (!empty($dataBerkas)) {
            if ($dataBerkas->getName() !== "") {
                $path = FCPATH . '/uploads/testimoni/';
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                $fileName = $dataBerkas->getRandomName();
                $image = \Config\Services::image()->withFile($dataBerkas)->resize(100, 100, true, 'height')->save($path . 'thumbnail' . $fileName);
                $dataBerkas->move($path, $fileName);
                $data['img'] =  $fileName;
                return $fileName;
            }
        }
        return "";
    }
}
