<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= pathCommon('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/css/custom.css?ver=' . rand()) ?>" rel="stylesheet">

    <title><?= $title ?? 'STV News' ?></title>
</head>

<body>

    <?php isset($forward) ? loadView($view, $forward) : loadView($view) ?>
    <script src="<?= pathCommon('assets/vendor/bootstrap/js/bootstrap.bundle.min.js?ver=' . rand()) ?>"></script>
    <script src="<?= pathCommon('assets/js/custom.js?ver=' . rand()) ?>"></script>
</body>


</html>