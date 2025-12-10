<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'PuWu - Pompong Lucu'; ?></title> 
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

    <script>
        const BASE_URL = "<?= base_url(); ?>";
    </script>
</head>
<body>

    <?= $this->renderSection('content'); ?>

    <script src="<?= base_url('js/script.js'); ?>"></script>
</body>
</html>