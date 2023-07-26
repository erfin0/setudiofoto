<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Models\PaketModel;
use App\Models\PembayaranModel;
use App\Models\UserModel;

class Booking extends Entity
{
    /* 
    Menunggu Persetujuan  
    Permintaan ditolak  
    Menunggu Pembayaran
    Menunggu konfirmasi Pembayaran
    Bukti pembayaran ditolak
    
    batal
    lunas
    selesai   
   */
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
        $this->attributes['created_at'] = date('Y-m-d H:i:s');
        return $this;
    }
    public function paket()
    {
        $model = new  PaketModel();
        return $model->find($this->attributes['paket_id']);
    }
    public function PenikikPemesan()
    {
        $model = new UserModel();
        return $model->find($this->attributes['users_id']);
    }
    public function Terbayar()
    {
        $model = new PembayaranModel();
        return $model->selectSum('nominal', 'total')->where('booking_id', $this->attributes['id'])->where('setuju', 'disetujui')->findAll()[0]->total;
    }

    public function getStatus()
    {
        if (($this->attributes['code'] == '') && (in_array($this->attributes['status'], ['Menunggu Pembayaran', 'Bukti pembayaran ditolak']))) {
            $waktu_sekarang = new \DateTime();
            $waktu_awal = new \DateTime($this->attributes['created_at']);
            $selisih = $waktu_sekarang->diff($waktu_awal);

            if (($selisih->y <= 0)&&($selisih->m <= 0)&&($selisih->d <= 0) ){
                return $this->attributes['status'];
               //&&($selisih->h < 12 ) &&($selisih->i <= 0)&&($selisih->s <= 0)
            } 
            return  "batal otomatis";         
        }

        return $this->attributes['status'];
    }
}
