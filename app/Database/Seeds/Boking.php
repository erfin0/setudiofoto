<?php

namespace App\Database\Seeds;


use CodeIgniter\Database\Seeder;


class Boking extends Seeder
{
    public function run()
    {
      
        $data =
            [
                'id'=>1,
                'paket_id' => 1,
                'users_id' => 1,
                'tgl_pesan' => '2023-06-30',
                'status' => 'lunas',
                'create_by' => 1,
                "code" => 'odr-' . uniqid(),
            ];
            $this->db->table('booking')->insertBatch($data);
    }
}
