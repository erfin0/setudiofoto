<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdditionalUserFields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'userfullname' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'username',
            ],
            'whatsapp' => [
                'type'       => 'varchar',
                'constraint' => 30,
                'null'       => true,
                'after'      => 'userfullname',
            ],
           
            'address' => [
                'type' => 'TEXT',
                'null'       => true,
                'after'      => 'whatsapp',
            ],
            'avatar' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'address',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['userfullname', 'whatsapp', 'address','avatar']);
    }
}
