<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
    {
        $data=[
        ['username'=>'admin',
        'pwd'=>password_hash('12345',PASSWORD_BCRYPT),
        ]
                ];
                $this->db->table('user')->insertBatch($data);
    }
}
