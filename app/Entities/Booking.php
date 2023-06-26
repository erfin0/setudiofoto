<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Booking extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    /* protected $attributes = [
        'id'         => null,
        'paket_id' => null,
        'users_id' => null,
        'tgl_pesan' => null,
        'status' => null,
        'qty_peserta' => null,
        'Total_harga' => null,
        'tgl_booking_start' => null,
        'tgl_booking_end' => null,
        'create_by' => null,
    ]; 
 */
    //  date('Y-m-d H:i:s', strtotime($this->request->getPost('date')));
   
    public function setTglPesan(string $tgl_pesan): Booking 
    {
        $this->attributes['tgl_pesan'] = date('Y-m-d H:i:s', strtotime($tgl_pesan)); 

        return $this;
    }
   
}
