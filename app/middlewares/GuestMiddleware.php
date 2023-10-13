<?php

namespace App\Middlewares;

use App\Classes\Login;
use App\Core\Middlewares;
use App\Core\Response;

class GuestMiddleware extends Middlewares
{
    public function handle($routeKey = '')
    {

        $login = new Login();
        // Bổ sung các route liên quan đến authentication sau
        if ($routeKey == 'dang-ky' || $routeKey == 'dang-nhap') {
            if ($login->isLogin()) {
                Response::redirect('');
            }
        }
        if (!empty($login->getAdmin())) {
            Response::redirect('admin');
        }
    }
}
