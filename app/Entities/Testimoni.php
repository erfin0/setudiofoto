<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Testimoni extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getauthorname()
    {
        return $this->getusername($this->attributes['users_id']);
       
    }
    public function  ximage($jenis = null)
    {
        $img = $this->attributes['image'] ?? '';
        switch ($jenis) {
            case 'mini':
                return base_url("uploads/testimoni/thumbnail{$img}");
                break;
            case 'max':
                return base_url("uploads/testimoni/{$img}");
                break;
            default:
                return $this->attributes['image'];
                break;
        }
    }
    public function getcommnt()
    {

        $model = new \App\Models\TestimoniBalasModel();


        $commet = $model->where('testimoni_id', $this->attributes['id'])->find();
        if ($commet) {
            $tulisan = '';
            foreach ($commet as  $value) {
                $tulisan .='<p><b>'. $this->getusername($value['users_id']) .'</b>: ' .$value['commen'] .'</p>' ;
            }
            return $tulisan;
        }
        return null;
    }

    private function getusername($id)
    {
        $users = auth()->getProvider();
        $penulis = $users->find($id);
        if ($penulis) {
            return $penulis->userfullname;
        }
        return null;
    }
}
