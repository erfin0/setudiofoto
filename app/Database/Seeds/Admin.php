<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data =  [
            [
                'id'              => '1',
                'username'            => 'admin',
                'userfullname'             => 'wilis',
                'address'           => 'Alamat: Jl. Imogiri Timur No 141',
                'whatsapp'               => '087839594951',
            ],
        ];
        $this->db->table('users')->insertBatch($data);
        $data =  [
            [
                'id'              => '1',
                'user_id'            => '1',
                'group'             => 'admin',
            ],
        ];
        $this->db->table('auth_groups_users')->insertBatch($data);
        $data =  [
            [
                'id'              => '1',
                'user_id'            => '1',
                'type'             => 'email_password',
                'secret' => 'admin@admin.com',
                'secret2' => '$2y$10$NqgYA.kupUnyZkUy0yLcxOIXGyRkVKwcMnvWSnuVQd7QoqTTuzd9G',
            ],
        ];
        $this->db->table('auth_identities')->insertBatch($data);
    }
}
