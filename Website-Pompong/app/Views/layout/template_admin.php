<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel'; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <script>const BASE_URL = "<?= base_url(); ?>";</script>
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="logo"><i class="fas fa-ship"></i> PuWu</div>
            <nav class="menu">
                <?php $active = $active_menu ?? ''; ?>
                <a href="<?= base_url('admin'); ?>" class="<?= ($active == 'dashboard') ? 'active' : ''; ?>">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
                <a href="<?= base_url('admin/stok'); ?>" class="<?= ($active == 'stok') ? 'active' : ''; ?>">
                    <i class="fas fa-box-open"></i> Kelola Stok
                </a>
                <a href="<?= base_url('admin/transaksi'); ?>" class="<?= ($active == 'transaksi') ? 'active' : ''; ?>">
                    <i class="fas fa-history"></i> Riwayat Transaksi
                </a>
                <a href="<?= base_url('logout'); ?>" class="logout">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="top-bar">
                <form action="<?= base_url('admin/transaksi'); ?>" method="get" class="search-bar">
                    <button type="submit" style="background:none; border:none; color:#999; cursor:pointer;"><i class="fas fa-search"></i></button>
                    <input type="text" name="keyword" placeholder="Cari nama penumpang..." value="<?= esc($_GET['keyword'] ?? '') ?>" autocomplete="off">
                </form>
                <div class="top-right-label">
                    <span class="badge-admin">Administrator</span>
                </div>
            </header>
            <div class="content-body">
                <?= $this->renderSection('content'); ?>
            </div>
        </main>
    </div>
    <script src="<?= base_url('js/script.js'); ?>"></script>
</body>
</html>