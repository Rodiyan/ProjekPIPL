<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="welcome-banner">
    <div class="welcome-text">
        <h2>Halo, Admin PuWu! 👋</h2>
        <p>Hari ini ada <b><?= $stok; ?></b> pompong yang siap beroperasi. Pantau terus penjualan tiketmu!</p>
    </div>
    <div class="welcome-img">
        <i class="fas fa-ship" style="font-size: 80px; opacity: 0.3; color: white;"></i>
    </div>
</div>

<div class="dashboard-grid">
    <div class="main-table">
        <div class="panel-header">
            <h3>Transaksi Terbaru</h3>
            <a href="<?= base_url('admin/transaksi'); ?>" class="btn-small">Lihat Semua</a>
        </div>
        <table class="table-clean">
            <thead>
                <tr>
                    <th>Penumpang</th>
                    <th>Rute</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($recent_trx as $t): ?>
                <tr>
                    <td>
                        <div class="user-cell">
                            <img src="https://ui-avatars.com/api/?name=<?= $t['nama_penumpang']; ?>&background=random" class="user-avatar">
                            <?= $t['nama_penumpang']; ?>
                        </div>
                    </td>
                    <td><?= $t['tujuan']; ?></td>
                    <td><span class="status-badge status-done">Paid</span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="widget-center">
        <i class="fas fa-box-open" style="font-size: 2rem; color: #fbc02d; margin-bottom: 15px;"></i>
        <h3>Sisa Stok</h3>
        <h1 style="font-size: 3rem; color: #333; margin: 5px 0;"><?= $stok; ?></h1>
        <a href="<?= base_url('admin/stok'); ?>" class="btn btn-primary" style="padding: 10px; font-size: 0.8rem;">Isi Stok</a>
    </div>

    <div class="widget-right">
        <i class="fas fa-chart-line" style="font-size: 2rem; color: #7e57c2; margin-bottom: 15px;"></i>
        <h3>Tiket Terjual</h3>
        <h1 style="font-size: 3rem; color: #333; margin: 5px 0;"><?= $total_trx; ?></h1>
        <small style="color: #888;">Sepanjang Waktu</small>
    </div>
</div>
<?= $this->endSection(); ?>