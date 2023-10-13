<?php

use App\Classes\Validate;
use App\Core\Controller;
use App\Core\Cookie;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Creator;
use App\Model\CreatorSession;
use App\Model\User;
use App\Model\UserSession;


class LoginController extends Controller
{
    private $user;
    private $creator;
    private $userSession;
    private $creatorSession;
    private $data = [];
    public function __construct()
    {
        $this->user = new User();
        $this->creator = new Creator();
        $this->userSession = new UserSession();
        $this->creatorSession = new CreatorSession();
    }
    public function index()
    {
        $this->data["title"] = "Đăng nhập";
        $this->data["view"] = $this->view(_CLENTS, 'auth/login');
        $this->data['forward']['errors'] = Session::flash('errors');
        $this->data['forward']['old'] = Session::flash('old');
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        return $this->layout('empty_layout', $this->data);
    }

    public function login()
    {
        $request = new Request();
        $validate = new Validate();

        if ($request->isPost()) {
            // Validate

            $validate->email($request->get('email'));
            $validate->password($request->get('password'));

            if (empty($validate->getErrors())) {
                // Xử lý đăng nhập tài khoản
                $email = $request->get('email');
                $condition = "email='$email'";
                // nếu login bằng user
                $userLogin = $this->user->getUser($condition);
                // nếu login bằng admin (creator)
                $adminLogin =  $this->creator->getCreator($condition);
                $infoLogin = [];
                $infoLogin = ($userLogin == false) ? $adminLogin : $userLogin;

                if (!empty($infoLogin)) {
                    $passwordHash = $infoLogin['password'];
                    if (password_verify($request->get('password'), $passwordHash)) {
                        $token = sha1(uniqid() . time());
                        $id = $infoLogin['id'];
                        if ($userLogin == true) {
                            $insertStatusUser = $this->insertUserSession($id, $token);
                        } else {
                            $insertStatusAdmin = $this->insertCreatorSession($id, $token);
                        }

                        // Lưu lại session và token
                        $this->saveSessionOrToken($token);
                        // điều hướng user->home, admin->admin dashboard
                        if ($insertStatusUser || $insertStatusAdmin) {
                            $this->redirectPage($insertStatusUser, $insertStatusAdmin);
                        }
                    } else {
                        Response::setMessage('Mật khẩu chưa chính xác', 'warning');
                    }
                } else {
                    Response::setMessage('Email chưa chính xác', 'warning');
                }
                Session::flash('old', $request->getAll());
            } else {
                Session::flash('errors', $validate->getErrors());
                Session::flash('old', $request->getAll());
                Response::setMessage('Vui lòng kiểm tra dữ liệu nhập vào!');
            }
        }

        Response::redirect('dang-nhap');
    }

    public function insertUserSession($id, $token)
    {
        $dataInsert = [
            'token' => $token,
            'user_id' => $id,
            'created_at' => dateDB(),
            'updated_at' => dateDB()
        ];
        return $this->userSession->insertUserSession($dataInsert);
    }

    public function insertCreatorSession($id, $token)
    {
        $dataInsert = [
            'token' => $token,
            'creator_id' => $id,
            'created_at' => dateDB(),
            'updated_at' => dateDB()
        ];
        return $this->creatorSession->insertCreatorSession($dataInsert);
    }

    public function saveSessionOrToken($token)
    {
        $request = new Request();
        if ($request->get('remember') == true) {
            Session::data('session_token', $token);
            Cookie::set('remember_token', $token, time() + _COOKIE_EXPIRES_TIME);
        } else {
            Session::data('session_token', $token);
            Cookie::set('temp_token', $token, time() + _COOKIE_EXPIRES_TIME);
        }
    }

    public function redirectPage($insertStatusUser, $insertStatusAdmin)
    {
        if ($insertStatusUser) {
            Response::redirect('');
        } elseif ($insertStatusAdmin) {
            Response::redirect('admin');
        } else {
            Response::setMessage('Hệ thống đang gặp sự cố, vui lòng thử lại sau', 'danger');
        }
    }
}
