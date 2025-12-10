<?php

namespace App\Controllers;

use App\Models\PengaturanModel;
use App\Models\TransaksiModel;

class Admin extends BaseController
{
    protected $pengaturanModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->pengaturanModel = new PengaturanModel();
        $this->transaksiModel  = new TransaksiModel();
    }

    public function index()
    {
        $data = [
            'title'      => 'Dashboard - Admin PuWu',
            'active_menu'=> 'dashboard',
            'stok'       => $this->pengaturanModel->getStok(),
            'total_trx'  => $this->transaksiModel->countAll(),
            // Hanya ambil 2 transaksi terbaru
            'recent_trx' => $this->transaksiModel->orderBy('created_at', 'DESC')->findAll(2)
        ];
        return view('admin/v_dashboard', $data);
    }

    public function stok()
    {
        $data = [
            'title'       => 'Kelola Stok - Admin PuWu',
            'active_menu' => 'stok',
            'stok'        => $this->pengaturanModel->getStok()
        ];
        return view('admin/v_stok', $data);
    }

    public function transaksi()
    {
        $keyword = $this->request->getGet('keyword');
        $builder = $this->transaksiModel->orderBy('created_at', 'DESC');

        if ($keyword) {
            $builder->groupStart()
                    ->like('nama_penumpang', $keyword)
                    ->orLike('tiket_id', $keyword)
                    ->groupEnd();
        }

        $data = [
            'title'       => 'Riwayat Transaksi - Admin PuWu',
            'active_menu' => 'transaksi',
            'transaksi'   => $builder->findAll(),
            'keyword'     => $keyword
        ];
        return view('admin/v_transaksi', $data);
    }

    public function update_stok()
    {
        $json = $this->request->getJSON();
        if(isset($json->stok) && $json->stok >= 0) {
            $this->pengaturanModel->updateStok($json->stok);
            return $this->response->setJSON(['status' => 'success']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Input tidak valid']);
    }
}