<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Anggota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'   => [
                'type'   => 'INT',
                'constraint'  => 11,
                'unsigned'    => true,
                'auto_increment' => true,
            ],
            'nama'  => [
                'type'  => 'VARCHAR',
                'constraint'  => '100',
            ],
            'alamat'  => [
                'type'  => 'VARCHAR',
                'constraint'  => '200',
            ],
            'nomor'  => [
                'type'  => 'VARCHAR',
                'constraint'  => '15',
            ]

            ]);
            $this->forge->addKey('id',true);
            $this->forge->createTable('anggota');
    }

    public function down()
    {
        $this->forge->dropTable('anggota');
    }
}
