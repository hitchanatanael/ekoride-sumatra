<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSupirTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],

            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],

            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
                'default'    => null,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('supir');
    }

    public function down()
    {
        $this->forge->dropTable('supir');
    }
}
