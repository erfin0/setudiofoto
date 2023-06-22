<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Portofolio as poto;
use App\Models\PortofolioModel;

class Portofolio extends BaseController
{
    public function index()
    {
        return view('Admin/PortofolioView');
    }
    public function new()
    {
        return view('Admin/PortofolioaddView');
    }
    public function create()
    {
        $rules = [
            'judul' => 'required|max_length[255]|min_length[3]',
            'keterangan' => 'required',
            'image' => 'uploaded[image]'
                . '|is_image[image]'
                . '|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                . '|max_size[image,5000]'
                . '|max_dims[image,6920,6080]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $poto = new poto();
        $potomodel = new PortofolioModel();
        $data = $this->request->getPost();
        $data['image'] = $this->simpan_img('image');
        $poto->fill($data);
        $potomodel->save($poto);

        return redirect()->to(base_url("admin/portofolio"))->with('message', 'tersimpan');
    }
    public function edit(int $potoId)
    {
        $model = new PortofolioModel();
        $poto =  $model->find($potoId);
        if ($poto === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('poto tidak di temukan');
        }
        $data['poto'] = $poto;
        return view('Admin/PortofolioeditView', $data);
    }
    public function update($potoId = null)
    {

        $model = new PortofolioModel();
        $poto =  $model->find($potoId);
        if ($poto === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('poto tidak di temukan');
        }

        $rules = [
            'judul' => 'required|max_length[255]|min_length[3]',
            'keterangan' => 'required',

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
            'id' => $potoId,
            'judul' => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if ($this->request->getFile('image') != "") {
            $data['image'] = $this->simpan_img('image');
        }

        $model->update($potoId, $data);
        return redirect()->back()->with('message', 'tersimpan');
    }

    public function tabel()
    {

        $model = new PortofolioModel();
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

    private function simpan_img($files)
    {
        $dataBerkas = $this->request->getFile($files);
        if (!empty($dataBerkas)) {
            if ($dataBerkas->getName() !== "") {
                $path = FCPATH . '/uploads/portofolio/';
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
    public function delete(int $potoId){
        $model = new PortofolioModel();
        $poto =  $model->find($potoId);
        if ($poto === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('poto tidak di temukan');
        }
        return  $model->delete($potoId);
        /* return $this->respondDeleted('ok'); */
    }
}
