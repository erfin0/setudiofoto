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
                'constraint' => 255,
                'null'       => true,
                'after'      => 'userfullname',
            ],
            'address' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'whatsapp',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['first_name', 'last_name', 'avatar']);
    }
}
