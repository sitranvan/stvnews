<?php

namespace App\Classes;

use App\Core\DataBase;
use App\Model\Creator;
use App\Model\User;

class Validate
{
    private $errors;
    private $user;
    private $creator;
    public function __construct()
    {
        $this->user = new User();
        $this->creator = new Creator();
        $this->errors = [];
    }


    public function fullname($fullname = null)
    {
        if (empty(trim($fullname))) {
            $this->errors['fullname'] = 'Họ và tên bắt buộc phải nhập';
        } else {
            if (strlen(trim($fullname)) < 2) {
                $this->errors['fullname'] = 'Họ tên tối thiểu 2 ký tự';
            }
        }
    }

    public function email($email = null, $unique = false)
    {
        if (empty(trim($email))) {
            $this->errors['email'] = 'Email bắt buộc phải nhập';
        } else {
            if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = 'Email không hợp lệ';
            }
            if ($unique == true) {
                $condition = "email='$email'";
                $checkEmailUser = $this->user->checkExists($condition);
                $checkEmailAdmin = $this->creator->checkExists($condition);
                if ($checkEmailUser || $checkEmailAdmin) {
                    $this->errors['email'] = 'Email đã tồn tại trong hệ thống';
                }
            }
        }
    }

    public function password($password = null)
    {

        if (empty(trim($password))) {
            $this->errors['password'] = 'Mật khẩu bắt buộc phải nhập';
        } else {
            if (strlen(trim($password)) < 6) {
                $this->errors['password'] = 'Mật khẩu tối thiểu 6 ký tự';
            } else {
                $pattern = '/^.*(?=.*[!@#$%^&*]).*$/';
                if (!preg_match($pattern, trim($password))) {
                    $this->errors['password'] = 'Mật khẩu chứa ít nhất 1 ký tự đặt biệt';
                }
            }
        }
    }

    public function confirmPassword($confirmPassword = null, $password = null)
    {
        if (empty(trim($confirmPassword))) {
            $this->errors['confirm_password'] = 'Xác nhận mật khẩu bắt buộc phải nhập';
        } else {
            if (!hash_equals($password, $confirmPassword)) {
                $this->errors['confirm_password'] = 'Mật khẩu không khớp';
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
