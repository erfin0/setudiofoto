<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Paket extends Seeder
{
    public function run()
    {
        $data =  [
            [
                'name' =>'Paket Wedding',
                'jenis'=> 'Paket A',
                'max_peserta'=> null,
                'harga'=> 500000,        
                'harga_perpeserta'=> null,
                'keterangan'=> '50 photo cetak 3R + Album DVD file photo',
                'max_time'=> null ,
                'image'=>'pwepa.jpg'
            ],
            [
                'name' =>'Paket Wedding',
                'jenis'=> 'Paket B',
                'max_peserta'=> null,
                'harga'=> 1000000,        
                'harga_perpeserta'=> null,
                'keterangan'=> '80 photo cetak 3R + Album DVD file photo 12R + figur',
                'max_time'=> null ,
                'image'=>'pwepb.jpg'
            ],
            [
                'name' =>'Paket wisuda',
                'jenis'=> 'Paket A',
                'max_peserta'=> 5,
                'harga'=> 350000,        
                'harga_perpeserta'=> null,
                'keterangan'=> '5 photo cetak 5R   DVD file photo 10R + figur',
                'max_time'=> 30 ,
                'image'=>'pwpa.jpg'
            ],
            [
                'name' =>'Paket wisuda',
                'jenis'=> 'Paket B',
                'max_peserta'=> 10,
                'harga'=> 500000,        
                'harga_perpeserta'=> null,
                'keterangan'=> '10 photo cetak 5R   DVD file photo 10R + figur',
                'max_time'=> 60 ,
                'image'=>'pwpb.jpg'
            ],
        ];
        $this->db->table('paket')->insertBatch($data);
    }
}
