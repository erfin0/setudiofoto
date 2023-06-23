<?php

namespace App\Controllers\Admin;

use App\Models\PaketModel;
use App\Entities\Paket as epaket;
use App\Controllers\BaseController;

class Paket extends BaseController
{
    public function index()
    {
        return view('Admin/PaketView');
    }
    public function new()
    {
        return view('Admin/PaketaddView');
    }
    public function edit(int $paketId)
    {
        $model = new PaketModel();
        $paket =  $model->find($paketId);
        if ($paket === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('paket tidak di temukan');
        }
        $data['paket'] = $paket;
        return view('Admin/PaketeditView', $data);
    }
    public function create()
    {
        $rules = [

            'name' => 'required|max_length[255]|min_length[3]|is_unique[paket.name]',
            'jenis' => 'required|max_length[255]',
            'harga' => 'numeric',
            'max_peserta' => 'permit_empty|numeric',
            'harga_perpeserta' => 'permit_empty|numeric',
            'max_time' => 'numeric',
            'keterangan' => 'required|min_length[3]',
            'image' => 'uploaded[image]'
                . '|is_image[image]'
                . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                . '|max_size[image,5000]'
                . '|max_dims[image,6920,6080]',];
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $paket = new epaket();
        $model = new PaketModel();
        $data = $this->request->getPost();
        $data['image'] = $this->simpan_img('image');
        $paket->fill($data);
        $model->save($paket);

        return redirect()->to(base_url("admin/paket"))->with('message', 'tersimpan');
    }
    public function update($paketId = null)
    {

        $model = new PaketModel();
        $paket =  $model->find($paketId);
        if ($paket === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('paket tidak di temukan');
        }

        $rules = [
            'name' => "required|max_length[255]|min_length[3]|is_unique[paket.name,id,{$paketId}]",
            'jenis' => 'required|max_length[255]',
            'harga' => 'numeric',
            'max_peserta' => 'permit_empty|numeric',
            'harga_perpeserta' => 'permit_empty|numeric',
            'max_time' => 'numeric',
            'keterangan' => 'required|min_length[3]',
        ];
        $imgrules = ['image' => 'uploaded[image]'
            . '|is_image[image]'
            . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
            . '|max_size[image,5000]'
            . '|max_dims[image,6920,6080]',];

        $rules =  ($this->request->getFile('image') != "") ? array_merge($rules,  $imgrules) : $rules;
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $paketId,
            'name' =>  $this->request->getPost('name'),
            'jenis' =>  $this->request->getPost('jenis'),
            'harga' =>  $this->request->getPost('harga'),
            'max_peserta' =>  $this->request->getPost('max_peserta'),
            'harga_perpeserta' =>  $this->request->getPost('harga_perpeserta'),
            'max_time' =>  $this->request->getPost('max_time'),
            'keterangan' =>  $this->request->getPost('keterangan'),
        ];

        if ($this->request->getFile('image') != "") {
            $data['image'] = $this->simpan_img('image');
        }

        $model->update($paketId, $data);
        return redirect()->back()->with('message', 'tersimpan');
    }
    public function delete(int $paketId)
    {
        $model = new PaketModel();
        $paket =  $model->find($paketId);
        if ($paket === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('poto tidak di temukan');
        }

        if (!$model->delete($paketId)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        } else {
            return  'ok';
        }
    }











    public function tabel()
    {
        /*  'name',
        'jenis',
        'harga',
        'max_peserta',
        'harga_perpeserta',
        'keterangan',
        'max_time', */

        helper('number');
        $model = new PaketModel();
        $lists = $model->getDatatables();
        $data = [];
        $no = $this->request->getPost('start');
        foreach ($lists as $list) {
            $no++;
            $row = [];
            $row[] = '<img src="' . $list->ximage('mini') . '"  style="height: 50px;">'  . $list->name;
            $row[] = $list->jenis;
            $row[] = $list->max_peserta;
            $row[] = number_to_currency($list->harga, 'idr', 'id_ID');
            $row[] = number_to_currency($list->harga_perpeserta, 'idr', 'id_ID');
            $row[] = $list->keterangan;
            $row[] = $list->max_time;
            $row[] = '<a class="btn mt-1 mx-1 btn-light" href="'
                . base_url("admin/paket/$list->id/edit")
                . '" role="button"> <i class="fa-solid fa-pen-to-square"></i></a>'
                . '<button class="btn mt-1 mx-1 btn-outline-danger" onclick="del(' . $list->id . ')"> <i class="fa-solid fa-trash-can"></i></button>';
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
    private function simpan_img($files)
    {
        $dataBerkas = $this->request->getFile($files);
        if (!empty($dataBerkas)) {
            if ($dataBerkas->getName() !== "") {
                $path = FCPATH . '/uploads/paket/';
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
