<?php

namespace App\Services;
use App\Models\UserModel;
use App\Common\ResultUtils;
class UserService extends BaseService
{
    private $users;
    function __construct(){
        parent::__construct();
        $this->users = new UserModel();
    }

    function getAllUsers(){
        return $this->users->findAll();
    }
    
    function addUserInfo($requestData){
        $validate = $this->validateAddUser($requestData);
        if ($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors()
            ];
        }
        dd($requestData);
        return [
            'status' => ResultUtils::STATUS_CODE_OK,
            'messageCode' => ResultUtils::MESSAGE_CODE_OK,
            'messages' => ['success' => 'Thêm dữ liệu thành công']
        ];
    }

    function validateAddUser($requestData){
        $rule = [
            'email' => 'valid_email|is_unique[users.UserEmail]',
            'password' => 'max_length[30]|min_length[6]',
            'firstName' => 'max_length[30]',
            'lastName' => 'max_length[30]',
            'zip' => 'max_length[5]|numeric[users.UserZip]',
            'phone' => 'max_length[10]|min_length[10]|numeric[users.UserPhone]|is_unique[users.UserPhone]',
            'fax' => 'max_length[10]|min_length[10]|numeric[users.UserPhone]|is_unique[users.UserFax]',
            'state' => 'max_length[30]',
            'country' => 'max_length[30]',
            'address' => 'max_length[30]',
            'address2' => 'max_length[30]',
        ];

        $message = [
            'email' => [
                'valid_email' => 'Email không đúng định dạng!',
                'is_unique' => 'Email đã được đăng ký!'
            ],
            'password' => [
                'max_length' => 'Mật khẩu quá dài!',
                'min_length' => 'Mật khẩu quá ngắn!'
            ],
            'firstName' => [
                'max_length' => 'Tên quá dài!'
            ],
            'lastName' => [
                'max_length' => 'Họ quá dài!',
                'min_length' => 'Họ quá ngắn!'
            ],
            'zip' => [
                'max_length' => 'Zip không đúng định dạng!',
                'numeric' => 'Zip không đúng định dạng!'
            ],
            'phone' => [
                'max_length' => 'Số điện thoại không đúng định dạng!',
                'min_length' => 'Số điện thoại không đúng định dạng!',
                'numeric' => 'Số điện thoại không đúng định dạng!',
                'is_unique' => 'Số điện thoại đã được đăng ký!'
            ],
            'fax' => [
                'max_length' => 'Số fax không đúng định dạng!',
                'min_length' => 'Số fax không đúng định dạng!',
                'numeric' => 'Số fax không đúng định dạng!',
                'is_unique' => 'Số fax đã được đăng ký!'
            ],
            'state' => [
                'max_length' => 'Tỉnh quá dài!'
            ],
            'address' => [
                'max_length' => 'Địa chỉ quá dài!'
            ],
            'address2' => [
                'max_length' => 'Địa chỉ 2 quá dài!'
            ],
        ];
        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
} 