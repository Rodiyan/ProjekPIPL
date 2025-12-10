<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<div class="card-panel">
    <div class="panel-header">
        <h3>Semua Riwayat Transaksi</h3>
        <button class="btn-small" onclick="window.print()"><i class="fas fa-print"></i> Cetak Laporan</button>
    </div>

    <table class="table-clean">
        <thead>
            <tr>
                <th>No</th>
                <th>Waktu</th>
                <th>ID Tiket</th>
                <th>Nama Penumpang</th>
                <th>Jenis Kelamin</th>
                <th>Rute Perjalanan</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($transaksi as $t): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d M Y, H:i', strtotime($t['created_at'])); ?></td>
                <td><span style="background:#eee; padding:3px 8px; border-radius:4px; font-family:monospace;"><?= $t['tiket_id']; ?></span></td>
                <td>
                    <div class="user-cell">
                        <img src="https://ui-avatars.com/api/?name=<?= $t['nama_penumpang']; ?>&background=random&size=32" class="user-avatar" style="width:30px; height:30px;">
                        <?= $t['nama_penumpang']; ?>
                    </div>
                </td>
                <td><?= $t['jenis_kelamin']; ?></td>
                <td><?= $t['tujuan']; ?></td>
                <td>Rp<?= number_format($t['harga'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>