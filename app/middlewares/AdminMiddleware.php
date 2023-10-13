<?php

namespace App\Middlewares;

use App\Classes\Login;
use App\Core\Middlewares;
use App\Core\Response;

class AdminMiddleware extends Middlewares
{
    public function handle()
    {
        $login = new Login();

        if (!$login->isLogin()) {
            Response::redirect('');
        }


        if (!empty($login->getUser())) {
            Response::redirect('');
        }
    }
}
