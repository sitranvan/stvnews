<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><img src="<?= pathClients('assets/img/icon/header_icon1.png') ?>" alt="">34ºc, Sunny </li>
                                    <li><img src="<?= pathClients('assets/img/icon/header_icon1.png') ?>" alt="">Tuesday, 18th June, 2019
                                    </li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?= route('') ?>"><img src="<?= pathClients('assets/img/logo/logo.png') ?>" alt=""></a>
                        </div>
                        <?php if (!empty(App\Classes\Login::loginUser())) : ?>
                            <ul>
                                <li class="nav-item dropdown user-dropdown">
                                    <span class="dropdown-toggle text-primary-emphasis fw-semibold user-name" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?= pathClients('assets/img/user/ninja.png') ?>" alt="user">
                                        <?= $fullname ?? '' ?>
                                    </span>
                                    <div class="dropdown-menu user-dropdown-menu border-0" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item user-item" href="#">
                                            <button class="user-item-icon">
                                                <i class='bx bx-user-pin'></i>
                                            </button>
                                            Thông tin cá nhân</a>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item user-item" href="<?= route('thay-doi-mat-khau') ?>">
                                            <button class="user-item-icon">
                                                <i class='bx bx-cog'></i>
                                            </button>
                                            Thay đổi mật khẩu</a>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item user-item" href="#">
                                            <button class="user-item-icon">
                                                <i class='bx bx-help-circle'></i>
                                            </button>
                                            Trợ giúp</a>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item user-item" href="<?= route('dang-xuat') ?>">
                                            <button class="user-item-icon">
                                                <i class='bx bx-log-out'></i>
                                            </button>
                                            Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        <?php else : ?>
                            <a href="<?= route('dang-nhap') ?>" class="login-text">
                                <i class="fa-solid fa-user-large mr-1"></i>
                                Chưa đăng nhập
                            </a>
                        <?php endif ?>

                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container container-header pb-4 pb-lg-0">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo w-100  d-flex align-items-center">
                                <a href="<?= route('') ?>"><img src="<?= pathClients('assets/img/logo/logo.png') ?>" alt=""></a>
                                <!-- Mobile Menu -->
                                <div class="col-12">
                                    <div class="mobile_menu d-block d-md-none"></div>
                                </div>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="<?= route('') ?>">Trang chủ</a></li>
                                        <li><a href="<?= route('danh-muc') ?>">Danh mục</a></li>
                                        <li><a href="<?= route('ve-chung-toi') ?>">Về chúng tôi</a></li>
                                        <li><a href="<?= route('tin-moi-nhat') ?>">Tin mới nhất</a></li>
                                        <li><a href="<?= route('lien-he') ?>">Liên hệ</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div style="padding: 0 30px;" class="col-xl-4 col-lg-4 col-md-12 pb-lg-0">
                            <div class="w-100 header-right-btn f-right ">
                                <div class="search">
                                    <form action="">
                                        <input placeholder="Nhập nội dung cần tìm..." type="text">
                                        <button class="d-flex align-items-center">
                                            <i class='bx bx-search'></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Header End -->
</header>