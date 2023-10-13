<?php

use App\Classes\Helpers;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;
use App\Model\Verify;

class VerifyController extends Controller
{
    private $verify;
    private $data = [];
    public function __construct()
    {
        $this->verify = new Verify();
    }
    public function index()
    {
        $verifyData = $this->getVerifyData();
        if (empty($verifyData)) {
            Response::redirect('');
        }
        $request = new Request();
        if (!empty($request->get('id'))) {
            $userId = $request->get('id');
            $this->data['forward']['userId'] = $userId;
        }

        $this->data['title'] = 'Xác thực tài khoản';
        $this->data['view'] = $this->view(_CLENTS, 'auth/verify');
        $this->data['forward']['msg'] = Session::flash('msg');
        $this->data['forward']['msg_type'] = Session::flash('msg_type');
        return $this->layout('empty_layout', $this->data);
    }

    public function resend()
    {
        // Làm sau
    }

    public function verify()
    {

        $verifyData = $this->getVerifyData();

        if ($verifyData['active'] == 1) {
            Response::redirect('');
        } else {
            $request = new Request();
            $userId = $request->get('id');
            $resultTime = Helpers::checkTimeVerified($verifyData['expires']);
            $otp = $verifyData['code'];
            if ($otp == (int)$request->get('otp') && $resultTime <= _VERIFIED_EXPIRES) {
                $dataUpdate = [
                    'active' => 1,
                    'expires' => null,
                    'actived_at' => dateDB(),
                    'updated_at' => dateDB(),
                ];
                $condition = 'user_id=' . $userId;
                $this->verify->updateVerify($dataUpdate, $condition);
                Response::redirect('');
            }

            if ($otp != (int)$request->get('otp')) {
                Response::setMessage('Mã OTP không hợp lệ', 'warning');
            } else {
                if ($resultTime > _VERIFIED_EXPIRES) {
                    Response::setMessage('Mã OTP của bạn đã hết hạn', 'warning');
                }
            }
            Response::redirect('xac-thuc?id=' . $userId);
        }
    }
    public function getVerifyData()
    {
        $request = new Request();
        $userId = $request->get('id');
        $condition = 'user_id=' . $userId;
        return $this->verify->getVerify($condition);
    }
}
