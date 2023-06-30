<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Pembayaran extends Entity
{
   
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];


    public function  ximage()
    {       
        return base_url("/uploads/buktitf/{$this->attributes['bukti']}");        
    }
}
