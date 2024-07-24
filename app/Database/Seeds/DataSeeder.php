<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $this->call('MobilSeeder');
        $this->call('PegawaiSeeder');
        $this->call('SupirSeeder');
        $this->call('UserSeeder');
        $this->call('RoleSeeder');
        $this->call('JabatanSeeder');
        $this->call('SupirMobilSeeder');
    }
}
