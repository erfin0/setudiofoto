<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Portofolio;

class PortofolioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'portofolio';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Portofolio::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul',
        'keterangan',
        'image',
    ];

    // Dates
    protected $useTimestamps = true;
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
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];




    protected $column_order = [
        'judul',
        'keterangan',

    ];
    protected $column_search = [
        'judul',
        'keterangan',
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
    public function getrandom($limit)
    {       
        return $this->orderBy('id', 'RANDOM')->findAll($limit);
    }
}