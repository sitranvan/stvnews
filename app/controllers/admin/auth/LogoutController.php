<?php

use App\Core\Controller;
use App\Core\Cookie;
use App\Core\Response;
use App\Core\Session;
use App\Model\CreatorSession;

class LogoutController extends Controller
{
    private $creatorSession;
    public function __construct()
    {
        $this->creatorSession = new CreatorSession();
    }
    public function index()
    {
        $rememberToken = Cookie::get('remember_token');
        $loginToken =  Session::data('session_token') ?? $rememberToken;
        $condition = "token='$loginToken'";
        $this->creatorSession->deleteCreatorSession($condition);

        if (isset($rememberToken)) {
            Cookie::set('remember_token', expires: time() - _COOKIE_EXPIRES_TIME);
        }
        session_destroy();
        Response::redirect('');
    }
}
