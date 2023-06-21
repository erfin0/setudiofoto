<?php

namespace App\Controllers\Admin;

use App\Models\TestimoniModel;
use App\Models\TestimoniBalasModel;
use App\Controllers\BaseController;

class Testimoni extends BaseController
{
    public function index()
    {
        return view('Admin/TestimoniView');
    }

    public function comment(int $testimoniId)
    {
        $model = new TestimoniModel();
        $testimoni =  $model->find($testimoniId);
        if ($testimoni === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('testimoni tidak di temukan');
        }
        $data['testimoni'] = $testimoni;
        return view('Admin/TestimoniaddcommenView', $data);
    }

    public function create_comment(int $testimoniId)
    {
        $rules = [
            'comment' => 'required',

        ];
        $model = new TestimoniModel();
        $testimoni =  $model->find($testimoniId);
        if ($testimoni === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('testimoni tidak di temukan');
        }
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $model = new TestimoniBalasModel();
        $data =
            [
                'commen' => $this->request->getPost('comment'),
               // 'users_id' => 1, // auth()->getUser()->id,
                'testimoni_id' => $testimoniId
            ];

        $model->insert($data);

        return redirect()->to(base_url("admin/testimoni"))->with('message', 'tersimpan');
    }
    public function tabel()
    {

        $model = new TestimoniModel();
        $lists = $model->getDatatables();
        $data = [];
        $no = $this->request->getPost('start');
        foreach ($lists as $list) {
            $no++;
            $comm = $list->getcommnt();
            $row = [];
            $row[] = '<img src="' . $list->ximage('mini') . '"  style="height: 50px;">'  . $list->getauthorname ?? '';
            $row[] = $list->keterangan;
            $row[] = $comm;
            $row[] = '<a class="btn mt-1 mx-1 btn-light" href="'
                . base_url("admin/testimoni/$list->id/comment")
                . '" role="button"> <i class="fa-solid fa-comment-medical"></i></a>';
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
