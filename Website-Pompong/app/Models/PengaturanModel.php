<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanModel extends Model
{
    protected $table            = 'pengaturan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_setting', 'nilai'];
    
    // Fungsi khusus untuk ambil stok
    public function getStok()
    {
        $data = $this->where('nama_setting', 'stok_pompong')->first();
        return $data ? (int)$data['nilai'] : 0;
    }

    // Fungsi update stok
    public function updateStok($nilaiBaru)
    {
        return $this->where('nama_setting', 'stok_pompong')
                    ->set(['nilai' => $nilaiBaru])
                    ->update();
    }
}