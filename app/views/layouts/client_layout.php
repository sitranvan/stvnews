<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= pathClients('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/ticker-style.css') ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/slicknav.css?ver=' . rand()) ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/slick.css') ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/nice-select.css') ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/style.css?ver=' . rand()) ?>">
    <link rel="stylesheet" href="<?= pathClients('assets/css/custom.css?ver=' . rand()) ?>">
    <link href="<?= pathClients('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title><?= $title ?? 'STV News' ?></title>
</head>

<body>
    <?php loadView('components/clients/header') ?>
    <main class="container">
        <?php isset($forward) ? loadView($view, $forward) : loadView($view) ?>
    </main>
    <?php loadView('components/clients/footer') ?>

    <script src="<?= pathClients('assets/vendor/modernizr-3.5.0.min.js') ?>"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?= pathClients('assets/vendor/jquery.min.js') ?>"></script>
    <script src="<?= pathClients('assets/js/popper.min.js') ?>"></script>
    <script src="<?= pathClients('/assets/js/bootstrap.min.js') ?>"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?= pathClients('assets/js/jquery.slicknav.min.js') ?>"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?= pathClients('assets/js/slick.min.js') ?>"></script>
    <script src="<?= pathClients('assets/js/owl.carousel.min.js') ?>"></script>
    <!-- Date Picker -->
    <script src="<?= pathClients('assets/js/gijgo.min.js') ?>"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="<?= pathClients('assets/js/wow.min.js') ?>"></script>
    <script src="<?= pathClients('assets/js/animated.headline.js') ?>"></script>
    <script src="<?= pathClients('assets/js/jquery.magnific-popup.js') ?>"></script>

    <!-- Breaking New Pluging -->
    <script src="<?= pathClients('assets/js/jquery.ticker.js') ?>"></script>
    <script src="<?= pathClients('assets/js/site.js') ?>"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="<?= pathClients('assets/js/jquery.scrollUp.min.js') ?>"></script>
    <script src="<?= pathClients('assets/js/jquery.nice-select.min.js') ?>"></script>
    <script src="<?= pathClients('assets/js/jquery.sticky.js') ?>"></script>


    <script src="<?= pathClients('assets/js/jquery.ajaxchimp.min.js') ?>"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?= pathClients('assets/js/plugins.js') ?>"></script>
    <script src="<?= pathClients('assets/js/main.js') ?>"></script>
    <script src="<?= pathClients('assets/js/custom.js?ver=' . rand()) ?>"></script>

</body>

</html>