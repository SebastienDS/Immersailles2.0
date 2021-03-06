<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <?php foreach ($style ?? [] as $css): ?>
        <link rel="stylesheet" href="<?= SCRIPT_NAME ?>/public/css/<?= $css ?>.css">
    <?php endforeach; ?>
</head>
<body>
    <?php require_once('views/include/header.php'); ?>
    <?= $content ?>
    <?php require_once('views/include/footer.php'); ?>
</body>
</html>