<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Admin',
                'nip'  => null,
                'id_jabatan' => 1,
            ],

            [
                'nama' => 'Puji Iswari, S.Hut., M.Si',
                'nip' => '196906251998032002',
                'id_jabatan' => 2,
            ],

            [
                'nama' => 'Erni Wulandari, S.Hut., ME',
                'nip' => '197401121998032001',
                'id_jabatan' => 3,
            ],

            [
                'nama' => 'Laura Paulina BMA, S.Si., M.Sc',
                'nip' => '197011071996032001',
                'id_jabatan' => 4,
            ],

            [
                'nama' => 'Alfi Fahmi, S.Pi., M.Si',
                'nip' => '197108211997031001',
                'id_jabatan' => 5,
            ],

            [
                'nama' => 'Suharyanto, ST., M.Si',
                'nip' => '196902181996031003',
                'id_jabatan' => 6,
            ],

            [
                'nama' => 'Khaerurrijal, S.Sos',
                'nip' => '196802201998031001',
                'id_jabatan' => 7,
            ],

            [
                'nama' => 'Frans David',
                'nip' => '197703232012121006',
                'id_jabatan' => 8,
            ],
        ];

        $this->db->table('pegawai')->insertBatch($data);
    }
}
