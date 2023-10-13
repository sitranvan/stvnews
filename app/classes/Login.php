<?php

namespace App\Classes;

use App\Core\Cookie;
use App\Core\DataBase;
use App\Core\Session;
use App\Model\CreatorSession;
use App\Model\UserSession;

class Login
{
    private $db;
    private $userSession;
    private $creatorSession;
    public function __construct()
    {
        $this->db = new DataBase();
        $this->userSession = new UserSession();
        $this->creatorSession = new CreatorSession();
    }
    public  function getUser()
    {
        $loginToken =  Session::data('session_token') ?? Cookie::get('remember_token');

        if (isset($loginToken)) {
            $query = "SELECT u.* FROM users u
            JOIN user_sessions us ON us.user_id = u.id
            WHERE us.token = '$loginToken'";
            return $this->db->fetchDB($query);
        }
    }

    public function getAdmin()
    {
        $loginToken =  Session::data('session_token') ?? Cookie::get('remember_token');

        if (isset($loginToken)) {
            $query = "SELECT cr.* FROM creators cr
            JOIN creator_sessions cs ON cs.creator_id = cr.id
            WHERE cs.token = '$loginToken'";
            return $this->db->fetchDB($query);
        }
    }

    public static function loginUser()
    {
        $user = new Login();
        if (!empty($user->getUser())) {
            return true;
        }
        return false;
    }

    public function isLogin()
    {
        $rememberToken = Cookie::get('remember_token');
        $loginToken =  Session::data('session_token') ?? $rememberToken;
        $tempToken = Cookie::get('temp_token') ?? '';

        if (isset($loginToken)) {

            $condition = "token='$loginToken'";
            $checkLogin = null;
            $checkUserLogin = $this->userSession->checkExists($condition);
            $checkCreatorLogin = $this->creatorSession->checkExists($condition);
            if ($checkUserLogin) {
                $checkLogin = $checkUserLogin;
            } else {
                $checkLogin = $checkCreatorLogin;
            }

            if ($checkLogin) {
                return true;
            } else {
                if (isset($rememberToken)) {
                    Cookie::set('remember_token', expires: time() - _COOKIE_EXPIRES_TIME);
                }
                Cookie::set('temp_token', expires: time() - _COOKIE_EXPIRES_TIME);
            }
        } else {


            $condition = "token='$tempToken'";
            $this->userSession->deleteUserSession($condition);
            Cookie::set('temp_token', expires: time() - _COOKIE_EXPIRES_TIME);
        }
        return false;
    }
}
