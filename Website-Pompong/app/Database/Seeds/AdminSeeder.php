<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            // Passwordnya: admin123 (tapi dienkripsi)
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
        ];

        // Masukkan ke database
        $this->db->table('admin_users')->insert($data);
    }
}