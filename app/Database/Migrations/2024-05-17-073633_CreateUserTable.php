<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
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
                'constraint' => '100',
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true
            ],

            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],

            'foto_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],

            'id_jabatan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'role_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
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
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
