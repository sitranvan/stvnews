<?php


use App\Core\View;

function loadView($path, $data = [])
{
    if (!empty(View::$dataShare)) {
        $data = array_merge($data, View::$dataShare);
    }
    extract($data);
    $fileView =  _DIR_ROOT . '/app/views/' . $path . '.php';
    if (file_exists($fileView)) {
        require_once $fileView;
    }
}

function pathAdmin($path = '')
{
    return _PUBLIC_ADMIN . '/' . $path;
}

function pathClients($path = '')
{
    return _PUBLIC_CLIENTS . '/' . $path;
}

function pathCommon($path = '')
{
    return _PUBLIC_COMMON . '/' . $path;
}




function route($route = '')
{
    return _WEB_ROOT . '/' . $route;
}

function isInvalid($errors = [], $fieldName = '')
{
    return isset($errors[$fieldName]) ? 'is-invalid' : false;
}

function getMessageError($errors = [], $fieldName = '')
{
    return $errors[$fieldName] ?? false;
}

function old($old = [], $fieldName = '')
{
    return $old[$fieldName] ?? false;
}

function alert($msg = '', $type = '')
{

    if (!empty($msg) && !empty($type)) {
        return ' 
    <div class="message-error alert alert-' . $type . ' alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
}

function dateDB()
{
    return date('Y-m-d H:i:s');
}

function getContentVerified($otp = null)
{
    $content = 'Mã OTP của bạn là: <b>' . $otp . '</b><br><br>
        
    Vui lòng sử dụng OTP để hoàn tất quá trình đăng nhập của bạn. OTP có giá trị trong 5 phút.
    <br><br>  
    Nếu bạn chưa thử đăng nhập ngay bây giờ, vui lòng bỏ qua email này. <br><br>
    
    Vui lòng liên hệ với chúng tôi để được trợ giúp bằng cách trả lời email này..<br><br>
    
    Trân trọng!';
    return $content;
}

function generateVerifiedCode()
{
    $numbers = range(0, 9);
    shuffle($numbers);
    $code = 0;
    for ($i = 0; $i < 6; $i++) {
        $code .= $numbers[$i];
    }

    return (int)$code;
}

function checkTimeVerified($verifiedExpires)
{

    // Chuyển verifiedExpires về timestamp
    $timestamp = strtotime($verifiedExpires = '');

    $currentTime = time();

    return $currentTime - $timestamp;
}
