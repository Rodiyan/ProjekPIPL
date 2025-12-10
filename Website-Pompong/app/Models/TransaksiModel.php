<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['tiket_id', 'nama_penumpang', 'jenis_kelamin', 'tujuan', 'harga'];
    
    // Mengaktifkan fitur otomatis isi tanggal
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}