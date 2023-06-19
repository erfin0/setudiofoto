<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Paket extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    public function  ximage($jenis = null)
    {
        switch ($jenis) {
            case 'mini':
                return base_url("uploads/paket/thumbnail{$this->attributes['image']}");
                break;
            case 'max':
                return base_url("uploads/paket/{$this->attributes['image']}");
                break;
            default:
                return $this->attributes['image'];
                break;
        }
    }
}
