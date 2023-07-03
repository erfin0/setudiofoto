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
        'keterangan',
        "code",
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
    protected $afterUpdate    = [];
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
        if (($paketterpilih->max_peserta !== null) && ($paketterpilih->harga_perpeserta !== null)  && ($paketterpilih->max_peserta < $data['data']['qty_peserta'])) {
            //total harga ditambah dengan harga perpeserta dikali jumlah sisa
            $data['data']['Total_harga'] += $paketterpilih->harga_perpeserta * ((int)$data['data']['qty_peserta'] - (int)$paketterpilih->max_peserta);
        }
        $data['data']['tgl_booking_end'] = date('Y-m-d H:i:s', strtotime($data['data']['tgl_pesan'] . "+$paketterpilih->max_time minutes"));


        return $data;
    }


    public function waktudiizinkan($datetime): bool
    {

        $data  = $this
            ->where('DATE(tgl_pesan)', date("Y-m-d", strtotime($datetime)))
            ->where('TIME(tgl_booking_start)<=', date("H:i:s", strtotime($datetime)))
            ->where('TIME(tgl_booking_end) >=', date("H:i:s", strtotime($datetime)))
            //  ->where("status <>'batal'")
            ->whereNotIn('status', ['Permintaan ditolak', 'batal'])
            ->countAllResults();

        $boleh = false;
        $now = time();
        $dtime = strtotime($datetime);
        
        if ((date("Y-m-d") < date("Y-m-d", strtotime($datetime))) &&  ($now < $dtime)) {
            $boleh = true;
        }

        return (($data == 0) && $boleh);
    }






    protected $column_order = ['tgl_pesan', 'paket_id', 'status'];
    protected $column_search = [
        'paket_id',
        'users_id',
        'tgl_pesan',
        'status',
        'qty_peserta',
        'Total_harga',
        'tgl_booking_start',
        'tgl_booking_end',

    ];
    protected $order = ['id' => 'DESC'];

    private function getDatatablesQuery()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->groupStart();
                    $this->like($item, $_POST['search']['value']);
                } else {
                    $this->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->groupEnd();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->orderBy($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->orderBy(key($order), $order[key($order)]);
        }


        if (!auth()->user()->inGroup('superadmin', 'admin')) {
            $this->where('users_id', auth()->getUser()->id);
        }
    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        if ($_POST['length'] != -1)
            return $this->findAll($_POST['length'],  $_POST['start']);
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        return $this->countAllResults();
    }

    public function countAll()
    {
        return $this->countAllResults();
    }
}
