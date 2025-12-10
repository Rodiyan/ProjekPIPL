<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitialDatabase extends Migration
{
    public function up()
    {
        // 1. TABEL PENGATURAN (STOK)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_setting' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nilai' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengaturan');

        // Isi data awal stok (Seeding sederhana langsung di sini)
        $this->db->table('pengaturan')->insert([
            'nama_setting' => 'stok_pompong',
            'nilai'        => 10 // Stok awal
        ]);

        // 2. TABEL TRANSAKSI
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tiket_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
            ],
            'nama_penumpang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'tujuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 8000.00,
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
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
        $this->forge->dropTable('pengaturan');
    }
}