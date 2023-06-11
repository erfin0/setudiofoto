<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datapesanan extends Migration
{
    public function up()
    {
        $this->forge->addField( [
            'id' =>  ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'   => ['type' => 'varchar', 'constraint' => 255],
            'jenis' => ['type' => 'varchar', 'constraint' => 255],
            'harga'  => ['type' => 'double',  'unsigned' => true, 'default' => 0],
            'max_peserta' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'harga_perpeserta' => ['type' => 'double',  'unsigned' => true, 'null' => true],
            'keterangan'=> ['type' => 'text', 'null' => true],
            'max_time'  => ['type' => 'time', 'null' => true],
        ]);
      
        $this->forge->createTable('paket', true);

        $this->forge->addField( [
            'id' =>  ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'gambar'   => ['type' => 'varchar', 'constraint' => 255],
             'keterangan'=> ['type' => 'text', 'null' => true],
           
        ]);
      
        $this->forge->createTable('testimoni', true);
        $this->forge->addField( [
            'id' =>  ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'paket_id'=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],          
            'users_id'=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'tgl_pesan'  => ['type' => 'datetime', 'null' => true],
            'status'  => ['type' => 'varchar', 'constraint' => 255],
            'qty_peserta' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],       
'Total_harga' => ['type' => 'double',  'unsigned' => true, 'default' => 0],
'tgl_booking_start'  => ['type' => 'datetime', 'null' => true],
'tgl_booking_end' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addForeignKey('users_id', 'users', 'id');
        $this->forge->addForeignKey('paket_id', 'paket', 'id');
        $this->forge->createTable('booking', true);

        $this->forge->addField( [
            'id' =>  ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'booking_id'=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],          
            'nominal' => ['type' => 'double',  'unsigned' => true, 'default' => 0],
            'jenis'  => ['type' => 'varchar', 'constraint' => 255],               

        ]);
       




        $this->forge->addForeignKey('booking_id', 'booking', 'id');
        $this->forge->createTable('pembayaran', true);


    }

    public function down()
    {
        $this->forge->dropTable('pembayaran', true);
        $this->forge->dropTable('booking', true);
        $this->forge->dropTable('testimoni', true);
        $this->forge->dropTable('paket', true);
    }
    
















}
