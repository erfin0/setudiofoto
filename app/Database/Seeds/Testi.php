<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Testi extends Seeder
{
    public function run()
    {
        $ket=[
            'tempat menarik',
            'karyawan ramah',
            'sip',
            'foto bagus',
            'sesuai',
            'semua terasa bagus',
            'saya ya',
            'ok saja',
            'bisa dilihat hasil',
            'sip',
            'foto bagus',
            'sesuai',
        ];
        for ($i = 0; $i < 12; $i++) {
            $data[] =
                [
                    'gambar' => "$i.jpg",
                    'keterangan'=>$ket[$i],
                    'users_id' => 1,
                    'booking_id' => 1
                ];
        }

        $this->db->table('testimoni')->insertBatch($data);
    }
}
