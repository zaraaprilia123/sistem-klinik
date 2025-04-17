<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Detailtransaksi extends Migration
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
            'no_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'id_obat' => [
                'type'       => 'INT',
                'constraint' => '11',
                'null' => false,
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => false,

            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_detailtransaksi');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_detailtransaksi');
    } 
}
