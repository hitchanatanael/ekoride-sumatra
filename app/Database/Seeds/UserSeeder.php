<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => password_hash('admin123', PASSWORD_BCRYPT),
                'role_id' => 1,
                'id_jabatan' => 1
            ],

            [
                'nama' => 'Erni Wulandari',
                'email' => 'erni@gmail.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role_id' => 3,
                'id_jabatan' => 3
            ],

            [
                'nama' => 'Laura Paulina',
                'email' => 'laura@gmail.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role_id' => 2,
                'id_jabatan' => 4
            ],

            [
                'nama' => 'Alfi Fahmi',
                'email' => 'alfi@gmail.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role_id' => 2,
                'id_jabatan' => 5
            ],

            [
                'nama' => 'Suharyanto',
                'email' => 'suharyanto@gmail.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role_id' => 2,
                'id_jabatan' => 6
            ],

            [
                'nama' => 'Khaerurrijal',
                'email' => 'rijal@gmail.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role_id' => 4,
                'id_jabatan' => 7
            ],

            [
                'nama' => 'Frans David',
                'email' => 'frans@gmail.com',
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role_id' => 4,
                'id_jabatan' => 8
            ]

        ];

        $this->db->table('users')->insertBatch($data);
        $this->db->query("UPDATE users SET foto_user = 'user.png'");
    }
}
