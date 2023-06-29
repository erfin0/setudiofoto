<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Pembayaran extends Entity
{
   /* 
    Menunggu konfirmasi
    Menunggu Pembayaran
    batal
    lunas
   
   */
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
