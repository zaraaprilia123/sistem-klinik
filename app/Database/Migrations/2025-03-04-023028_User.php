<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_user' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
                
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
                
            ],'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                
            ],'nohp' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => true,
                
            ],'tgl_lahir' => [
                'type' => 'DATE',
                'null' => true,
                
            ],'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin','dokter','kasir','pasien'],
                'null' => true,
                
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_user');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_user');
    }
}
