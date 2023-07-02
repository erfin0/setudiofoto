<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Codeboking extends Migration
{
    public function up()
    {
        $this->forge->addColumn('booking', [
            'code' =>['type' => 'varchar', 'constraint' => 255,'null' => true],          
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('booking', ['code']);
    }
}
