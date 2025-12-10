<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - PuWu</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <style>
        body { display: flex; justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(135deg, #fbc02d 0%, #f57f17 100%); }
        .login-card { background: white; padding: 40px; border-radius: 20px; width: 100%; max-width: 400px; text-align: center; }
    </style>
</head>
<body>
    <div class="login-card">
        <h1 style="color:#fbc02d; font-size: 3rem;"><i class="fas fa-ship"></i></h1>
        <h2 style="color:#333;">Admin PuWu</h2>
        <p style="color:#777; margin-bottom:20px;">Silakan login untuk mengelola.</p>
        
        <?php if(session()->getFlashdata('msg')):?>
            <div style="background:#ffebee; color:red; padding:10px; margin-bottom:15px; border-radius:8px;"><?= session()->getFlashdata('msg') ?></div>
        <?php endif;?>

        <form action="<?= base_url('/login/process'); ?>" method="post">
            <div class="form-group" style="text-align: left;">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group" style="text-align: left;">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">MASUK</button>
        </form>
    </div>
</body>
</html>