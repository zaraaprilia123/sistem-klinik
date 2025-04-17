<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_user'     => 'admin',
            'username'      => 'admin',
            'password'      => password_hash('admin', PASSWORD_BCRYPT),
            'email'         => 'admin@gmail.com',
            'nohp'          => '0123456789',
            'tgl_lahir'     => '2007-01-01',
            'role'          => 'admin',
        ];

       
        $this->db->table('tbl_user')->insert($data);
    }
}
