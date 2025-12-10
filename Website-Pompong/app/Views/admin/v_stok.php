<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<div class="card-panel" style="max-width: 500px; margin: 0 auto; text-align: center; padding: 40px;">
    <div style="background: #fffde7; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
        <i class="fas fa-edit" style="font-size: 30px; color: #fbc02d;"></i>
    </div>
    
    <h2>Kelola Stok Pompong</h2>
    <p style="color: #777; margin-bottom: 30px;">Update jumlah ketersediaan tiket secara real-time.</p>

    <div class="form-group" style="text-align: left;">
        <label>Jumlah Stok Saat Ini</label>
        <input type="number" id="inputStok" class="form-control" value="<?= $stok; ?>" style="font-size: 2rem; text-align: center; font-weight: bold;">
    </div>

    <button class="btn btn-primary" onclick="updateStokAdmin()">
        <i class="fas fa-save"></i> SIMPAN PERUBAHAN
    </button>
</div>

<?= $this->endSection(); ?>