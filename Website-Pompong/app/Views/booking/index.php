<?= $this->extend('layout/template_main'); ?>

<?= $this->section('content'); ?>

<div class="main-wrapper">
    <div class="card-container">
        
        <div class="header-section">
            <i class="fas fa-ship icon-boat"></i>
            <h2>PuWu</h2>
            <p>Jalan-jalan santai, aman sampai tujuan!</p>
        </div>

        <div id="page1" class="page-section active">
            <div class="form-group">
                <label>Nama Kamu Siapa?</label> <input type="text" id="nama" class="form-control" placeholder="Tulis nama lengkap ya...">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select id="kelamin" class="form-control">
                    <option value="">-- Pilih Dulu --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <button class="btn btn-primary" onclick="validateAndNext()">
                Lanjut Yuk <i class="fas fa-arrow-right"></i>
            </button>
        </div>

        <div id="page2" class="page-section">
            <h3 style="text-align:center; color:#5d4037; margin-bottom:15px;">Mau Kemana Nih?</h3>
            
            <div class="rute-option" onclick="selectRute(this, 'Tanjung Pinang → Pulau Penyengat')">
                <div class="rute-info">
                    <span class="route-text">Tg. Pinang <i class="fas fa-long-arrow-alt-right"></i> P. Penyengat</span>
                    <span class="price-tag">Rp8.000</span>
                </div>
                <span class="badge-stok <?= ($stok <= 0) ? 'habis' : '' ?>">
                    <?= ($stok > 0) ? $stok . ' Pompong' : 'HABIS' ?>
                </span>
            </div>

            <div class="rute-option" onclick="selectRute(this, 'Pulau Penyengat → Tanjung Pinang')">
                <div class="rute-info">
                    <span class="route-text">P. Penyengat <i class="fas fa-long-arrow-alt-right"></i> Tg. Pinang</span>
                    <span class="price-tag">Rp8.000</span>
                </div>
                <span class="badge-stok <?= ($stok <= 0) ? 'habis' : '' ?>">
                    <?= ($stok > 0) ? $stok . ' Pompong' : 'HABIS' ?>
                </span>
            </div>

            <button class="btn btn-primary" id="btnBayar" onclick="processBooking()">
                Bayar & Cetak Tiket <i class="fas fa-ticket-alt"></i>
            </button>
            <button class="btn btn-secondary" onclick="showPage('page1')">Kembali</button>
        </div>

        <div id="page3" class="page-section">
            <div style="text-align: center; color: #fbc02d; margin-bottom: 15px;">
                <i class="fas fa-check-circle" style="font-size: 3rem;"></i>
                <h3 style="margin-top: 10px; color: #5d4037;">Hore, Berhasil!</h3>
            </div>

            <div class="tiket-card">
                <div class="tiket-header">TIKET RESMI PUWU</div>
                <h2 id="displayId" class="tiket-id">...</h2>
                <div class="tiket-row">
                    <span>Nama</span>
                    <strong id="displayNama">...</strong>
                </div>
                <div class="tiket-row">
                    <span>Rute</span>
                    <strong id="displayRute">...</strong>
                </div>
                <div class="tiket-total">
                    LUNAS Rp8.000
                </div>
            </div>

            <button class="btn btn-primary" onclick="window.location.reload()">Pesan Lagi</button>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>