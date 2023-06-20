<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Testimonibalasan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>  ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'testimoni_id' =>  ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'commen' => ['type' => 'text', 'null' => true],
            'users_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('users_id', 'users', 'id');
        $this->forge->addForeignKey('testimoni_id', 'testimoni', 'id');
        $this->forge->createTable('testimoni_balas', true);
    }

    public function down()
    {
        $this->forge->dropTable('testimoni_balas', true);
    }
}
