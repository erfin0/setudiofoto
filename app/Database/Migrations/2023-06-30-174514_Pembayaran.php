<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pembayaran', [
            'setuju' => ['type' => 'varchar', 'constraint' => 255],
            'bukti' => ['type' => 'varchar', 'constraint' => 255],
            'updated_at'  => ['type' => 'datetime', 'null' => true],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('pembayaran', ['setuju','bukti','updated_at']);
    }
}
