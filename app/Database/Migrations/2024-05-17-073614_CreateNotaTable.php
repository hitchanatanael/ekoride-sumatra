<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotaTable extends Migration
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

            'id_user' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'id_jabatan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'no_dinas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],

            'kabag' => [
                'type'       => 'VARCHAR',
                'constraint' => '100'
            ],

            'hal' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],

            'lampiran' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true
            ],

            'tgl_surat' => [
                'type' => 'DATE',
                'null' => false
            ],

            'deskripsi' => [
                'type' => 'TEXT',
            ],

            'lokasi_kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],

            'tgl_mulai' => [
                'type' => 'DATE',
                'null' => false
            ],

            'tgl_selesai' => [
                'type' => 'DATE',
                'null' => false
            ],

            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'progress', 'approved', 'rejected'],
                'default'    => 'pending',
            ],

            'jml_orang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true
            ],

            'tambahan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true
            ],


            'id_supir_mobil' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true
            ],

            'baca_kabag' => [
                'type'    => 'BOOLEAN',
                'default' => false
            ],

            'baca_pj' => [
                'type'    => 'BOOLEAN',
                'default' => false
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
        $this->forge->createTable('nota');
    }

    public function down()
    {
        $this->forge->dropTable('nota');
    }
}
