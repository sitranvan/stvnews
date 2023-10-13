<?php

namespace App\Middlewares;

use App\Classes\Login;
use App\Core\Middlewares;
use App\Core\Response;


class AuthMiddleware extends Middlewares
{

    public function handle()
    {

        $login = new Login();

        if (!$login->isLogin()) {
            Response::redirect('dang-nhap');
        }
        if (!empty($login->getAdmin())) {
            Response::redirect('admin');
        }
    }
}
