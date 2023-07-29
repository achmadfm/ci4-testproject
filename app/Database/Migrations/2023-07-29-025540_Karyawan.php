<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],

            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'jabatan' => [
                'type' => 'ENUM',
                'constraint' => ['fullstack', 'frontend', 'backend', 'webdev', 'mobiledev'],
                'default' => 'fullstack'
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['lk', 'pr'],
                'default' => 'lk'
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('karyawan', true);
    }

    public function down()
    {
        $this->forge->dropTable('karyawan');
    }
}
