<?php

namespace App\Middlewares;

use App\Classes\Login;
use App\Core\Middlewares;
use App\Model\UserSession;

class CheckLoginMiddleware extends Middlewares
{
    public function handle()
    {
        $login = new Login();
        $login->isLogin();
    }
}
