<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SupirMobilSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_supir' => 1,
                'id_mobil' => 1,
            ],

            [
                'id_supir' => 1,
                'id_mobil' => 2,
            ],
            [
                'id_supir' => 1,
                'id_mobil' => 3,
            ],
            [
                'id_supir' => 1,
                'id_mobil' => 4,
            ],
            [
                'id_supir' => 2,
                'id_mobil' => 5,
            ],
            [
                'id_supir' => 2,
                'id_mobil' => 6,
            ],
            [
                'id_supir' => 2,
                'id_mobil' => 7,
            ],
            [
                'id_supir' => 3,
                'id_mobil' => 8,
            ],
            [
                'id_supir' => 3,
                'id_mobil' => 9,
            ],
            [
                'id_supir' => 3,
                'id_mobil' => 10,
            ],
            [
                'id_supir' => 4,
                'id_mobil' => 11,
            ],
            [
                'id_supir' => 4,
                'id_mobil' => 12,
            ],
            [
                'id_supir' => 4,
                'id_mobil' => 13,
            ],
            [
                'id_supir' => 5,
                'id_mobil' => 14,
            ],
            [
                'id_supir' => 5,
                'id_mobil' => 15,
            ],
            [
                'id_supir' => 6,
                'id_mobil' => 16,
            ],
            [
                'id_supir' => 6,
                'id_mobil' => 17,
            ],
            [
                'id_supir' => 6,
                'id_mobil' => 18,
            ],

        ];

        $this->db->table('supir_mobils')->insertBatch($data);
    }
}
