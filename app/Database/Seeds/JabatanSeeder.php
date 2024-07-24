<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jabatan' => 'Admin'
            ],
            [
                'jabatan' => 'Kepala P3E Sumatera'
            ],

            [
                'jabatan' => 'Kepala Bagian Tata Usaha'
            ],

            [
                'jabatan' => 'Kabid Perencanaan PSDALH (Kabid 1)'
            ],

            [
                'jabatan' => 'Kabid Fasilitasi PPE (Kabid 2)'
            ],

            [
                'jabatan' => 'Kabid Evaluasi PPE (kabid 3)'
            ],

            [
                'jabatan' => 'Analis Pengelolaan Keuangan APBN Ahli Muda (Kepala Sub Koordinator Umum dan Keuangan)'
            ],

            [
                'jabatan' => 'Pengelola Kendaraan Dinas pada Bagian Tata Usaha'
            ],
        ];

        $this->db->table('jabatan')->insertBatch($data);
    }
}
