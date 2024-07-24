<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MobilSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_mobil' => 'NAVARA SILVER',
                'plat' => 'BM 8233 TP',
            ],

            [
                'nama_mobil' => 'INOVA SOLAR',
                'plat' => 'BM 1539 T'
            ],

            [
                'nama_mobil' => 'BUS HINO',
                'plat' => 'BM 7040 TP'
            ],

            [
                'nama_mobil' => 'HI ACE',
                'plat' => 'BM 7028 NPA'
            ],

            //

            [
                'nama_mobil' => 'INOVA G',
                'plat' => 'BM 1453 TP'
            ],

            [
                'nama_mobil' => 'KUDA GRANDIA',
                'plat' => 'BM 1554 TP'
            ],

            [
                'nama_mobil' => 'SUZUKI ESCUDO',
                'plat' => 'BM 1928 AP'
            ],

            //

            [
                'nama_mobil' => 'INOVA V',
                'plat' => 'BM 1158 AP'
            ],

            [
                'nama_mobil' => 'KUDA GRANDIA',
                'plat' => 'BM 1876 AP'
            ],

            [
                'nama_mobil' => 'NAVARA HITAM',
                'plat' => 'BM 8234 TP'
            ],

            //

            [
                'nama_mobil' => 'ISUZU PHANTER',
                'plat' => 'BM 1542 T'
            ],

            [
                'nama_mobil' => 'SUZUKI APV',
                'plat' => 'BM 1075 TP'
            ],

            [
                'nama_mobil' => 'BUS PUSTAKA',
                'plat' => 'BM 8794 AP'
            ],

            //

            [
                'nama_mobil' => 'PAJERO DAKKAR',
                'plat' => 'BM 77'
            ],

            [
                'nama_mobil' => 'PAJERO SPORT',
                'plat' => 'BM 1541 T'
            ],

            //

            [
                'nama_mobil' => 'XTRAIL',
                'plat' => 'BM 1748 TP'
            ],

            [
                'nama_mobil' => 'INOVA E',
                'plat' => 'BM 1452 TP'
            ],

            [
                'nama_mobil' => 'MERCY',
                'plat' => 'BM 1393 BX'
            ],

        ];

        $this->db->table('mobil')->insertBatch($data);
        $this->db->query("UPDATE mobil SET foto_mobil = 'default.jpg'");
    }
}
