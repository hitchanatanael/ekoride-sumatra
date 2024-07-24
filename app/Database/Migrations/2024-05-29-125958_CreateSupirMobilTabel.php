<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSupirMobilTabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],

            'id_supir' => [
                'type' => 'INT',
                'constraint' => 11,
            ],

            'id_mobil' => [
                'type' => 'INT',
                'constraint' => 11
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('supir_mobils');
    }

    public function down()
    {
        $this->forge->dropTable('supir_mobils');
    }
}
