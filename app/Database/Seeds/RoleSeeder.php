<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role' => 'admin'
            ],

            [
                'role' => 'peminjam'
            ],

            [
                'role' => 'kabag'
            ],

            [
                'role' => 'pj'
            ],

        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
