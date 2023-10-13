<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= pathAdmin('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= pathAdmin('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= pathAdmin('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= pathAdmin('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= pathAdmin('assets/css/style.css') ?>" rel="stylesheet">

    <title><?= $title ?? 'STV News' ?></title>
</head>

<body>
    <?php loadView('components/admin/header') ?>
    <?php loadView('components/admin/sidebar') ?>
    <main id="main" class="main">
        <?php isset($forward) ? loadView($view, $forward) : loadView($view) ?>
    </main>
    <?php loadView('components/admin/footer') ?>

    <script src="<?= pathAdmin('assets/vendor/bootstrap/js/bootstrap.bundle.min.js?ver=' . rand()) ?>"></script>
    <script src="<?= pathAdmin('assets/js/main.js?ver=' . rand()) ?>"></script>
</body>


</html>