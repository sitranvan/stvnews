<?php
$routes = [
    // Admin route
    _ADMIN => [
        'admin' => 'admin/DashboardController',
        'admin/danh-muc' => 'admin/CategoryController',
        'admin/dang-xuat' => 'admin/auth/LogoutController'
    ],
    // Clients route
    _CLENTS => [
        '/' => 'clients/HomeController',
        'dang-ky' => 'clients/auth/RegisterController',
        'submit-register' => 'clients/auth/RegisterController/register',
        'xac-thuc' => 'clients/auth/VerifyController',
        'submit-verify' => 'clients/auth/VerifyController/verify',
        'resend' => 'clients/auth/VerifyController/resend',
        'dang-nhap' => 'clients/auth/LoginController',
        'submit-login' => 'clients/auth/LoginController/login',
        'dang-xuat' => 'clients/auth/LogoutController',
        'danh-muc' => 'clients/CategoryController',
        've-chung-toi' => 'clients/AboutController',
        'tin-moi-nhat' => 'clients/LatestNewsController',
        'lien-he' => 'clients/ContactController',
        'phan-tu' => 'clients/ElementController',
        'blog' => 'clients/BlogController',
        'chi-tiet' => 'clients/HomeController/detail',

    ]
];
