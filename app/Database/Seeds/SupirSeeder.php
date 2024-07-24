<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SupirSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Sendri Haryanto',
            ],

            [
                'nama' => 'Suparno',
            ],

            [
                'nama' => 'Endi Saputra',
            ],

            [
                'nama' => 'Jupri Hadi',
            ],

            [
                'nama' => 'Dedy Susanto',
            ],

            [
                'nama' => 'Ruli Kurniawan',
            ],
        ];

        $this->db->table('supir')->insertBatch($data);
    }
}
