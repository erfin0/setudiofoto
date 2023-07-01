<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Adddscboking extends Migration
{
    public function up()
    {
        $this->forge->addColumn('booking', [
            'keterangan' => ['type' => 'text', 'null' => true],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('booking', ['keterangan']);
    }
}
