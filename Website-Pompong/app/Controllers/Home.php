<?php

namespace App\Controllers;

use App\Models\PengaturanModel;
use App\Models\TransaksiModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new PengaturanModel();
        
        $data = [
            'title' => 'Pemesanan Tiket Pompong',
            'stok'  => $model->getStok()
        ];

        return view('booking/index', $data);
    }

    public function pesan()
    {
        $pengaturanModel = new PengaturanModel();
        $transaksiModel  = new TransaksiModel();
        
        // Terima data JSON dari Javascript
        $json = $this->request->getJSON();

        if (!$json) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Data tidak valid']);
        }

        // Mulai Database Transaction (Agar aman dari rebutan stok)
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // 1. Cek Stok (Lock Row untuk keamanan concurrency)
            // Di CI4 basic kita cek manual saja dulu
            $stokSekarang = $pengaturanModel->getStok();

            if ($stokSekarang <= 0) {
                throw new \Exception("Mohon maaf, tiket sudah habis!");
            }

            // 2. Kurangi Stok
            $pengaturanModel->updateStok($stokSekarang - 1);

            // 3. Simpan Transaksi
            $transaksiModel->save([
                'tiket_id'       => $json->tiketId,
                'nama_penumpang' => $json->nama,
                'jenis_kelamin'  => $json->kelamin,
                'tujuan'         => $json->tujuan,
                'harga'          => 8000
            ]);

            $db->transComplete(); // Selesaikan transaksi

            if ($db->transStatus() === false) {
                throw new \Exception("Gagal menyimpan transaksi.");
            }

            return $this->response->setJSON(['status' => 'success']);

        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}