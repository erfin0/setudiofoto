<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Portofolio extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function  ximage($jenis = null)
    {
        switch ($jenis) {
            case 'mini':
                return base_url("uploads/portofolio/thumbnail{$this->attributes['image']}");
                break;
            case 'max':
                return base_url("uploads/portofolio/{$this->attributes['image']}");
                break;
            default:
                return $this->attributes['image'];
                break;
        }
    }
   
}
