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
        'thay-doi-mat-khau' => 'clients/auth/ChangePasswordController',
        'submit-change-password' => 'clients/auth/ChangePasswordController/changePassword',
        'quen-mat-khau' => 'clients/auth/ForgotPasswordController',
        'submit-forgot-password' => 'clients/auth/ForgotPasswordController/forgotPassword',
        'khoi-phuc-mat-khau' => 'clients/auth/ResetPasswordController',
        'submit-reset-password' => 'clients/auth/ResetPasswordController/resetPassword',
        'danh-muc' => 'clients/CategoryController',
        've-chung-toi' => 'clients/AboutController',
        'tin-moi-nhat' => 'clients/LatestNewsController',
        'lien-he' => 'clients/ContactController',
        'phan-tu' => 'clients/ElementController',
        'blog' => 'clients/BlogController',
        'chi-tiet' => 'clients/HomeController/detail',

    ]
];
