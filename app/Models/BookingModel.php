<?php

namespace App\Models;

use App\Entities\Booking;
use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'booking';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Booking::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'paket_id',
        'users_id',
        'tgl_pesan',
        'status',
        'qty_peserta',
        'Total_harga',
        'tgl_booking_start',
        'tgl_booking_end',
        'create_by',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['insertbokingBefore'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = ['insertbokingBefore'];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function insertbokingBefore($data)
    {
        $modelpaket = new PaketModel();
        $paketterpilih = $modelpaket->find($data['data']['paket_id']);
        $data['data']['create_by'] =   auth()->getUser()->id;
        $data['data']['tgl_booking_start'] =  $data['data']['tgl_pesan'];
        $data['data']['Total_harga'] = $paketterpilih->harga;
        //jika dalam databse paket ada batasan peserta atau harga perpeserta ada dan max simal pesereta melebihi 
        if (($paketterpilih->max_peserta!==null) && ($paketterpilih->harga_perpeserta !==null)  && ($paketterpilih->max_peserta < $data['data']['qty_peserta'])) {
            //total harga ditambah dengan harga perpeserta dikali jumlah sisa
            $data['data']['Total_harga'] += $paketterpilih->harga_perpeserta * ((int)$data['data']['qty_peserta'] - (int)$paketterpilih->max_peserta);
        }
        $data['data']['tgl_booking_end'] = date('Y-m-d H:i:s', strtotime( $data['data']['tgl_pesan'] . "+$paketterpilih->max_time minutes")); 


        return $data;
    }
}
