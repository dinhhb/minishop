<?php

namespace App\Services;
use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class UserService extends BaseService
{
    private $users;
    function __construct(){
        parent::__construct();
        $this->users = new UserModel();
        $this->users->protect(false);
    }

    function getAllUsers(){
        return $this->users->findAll();
    }
    
    private function generateRandomCode($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        $charactersLength = strlen($characters);
        
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[mt_rand(0, $charactersLength - 1)];
        }
        
        return $code;
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
        $dataSave = $requestData->getPost();
    
        $dataToSave = [
            'UserEmail' => $dataSave['email'],
            'UserPassword' => password_hash( $dataSave['password'],PASSWORD_BCRYPT),
            'UserFirstName' => $dataSave['firstName'],
            'UserLastName' => $dataSave['lastName'],
            'UserCity' => $dataSave['city'],
            'UserState' => $dataSave['state'],
            'UserZip' => $dataSave['zip'],
            'UserEmailVerified' => 1, // Giả sử mặc định đã xác minh email
            'UserRegistrationDate' => date('Y-m-d H:i:s'), // Thêm ngày đăng ký
            'UserVerificationCode' =>  $this->generateRandomCode(10),
            'UserIP' => $_SERVER['REMOTE_ADDR'], // Lấy IP của người dùng
            'UserPhone' => $dataSave['phone'],
            'UserFax' => $dataSave['fax'],
            'UserCountry' => $dataSave['country'],
            'UserAddress' => $dataSave['address'],
            'UserAddress2' => $dataSave['address2'],
            'UserIsAdmin' => 0, // Giả sử không phải admin
        ];
    
        try{
            $this->users->save($dataToSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Thêm dữ liệu thành công']
            ];
        } catch (Exception $e){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['error' => $e->getMessage()]
            ];
        }
    }

    public function getUserByID($userId){
        return $this->users->where('UserID', $userId)->first();
    }

    private function validateAddUser($requestData){
        $rule = [
            'email' => 'valid_email|is_unique[users.UserEmail]',
            'password' => 'max_length[30]|min_length[6]',
            'firstName' => 'max_length[30]',
            'lastName' => 'max_length[30]',
            'zip' => 'max_length[5]|numeric[users.UserZip]',
            'phone' => 'max_length[10]|min_length[10]|numeric[users.UserPhone]|is_unique[users.UserPhone]',
            'fax' => 'max_length[10]|min_length[10]|numeric[users.UserPhone]|is_unique[users.UserFax]',
            'city' => 'max_length[30]',
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
            'city' => [
                'max_length' => 'Tên hành phố quá dài!'
            ],
            'state' => [
                'max_length' => 'Tên tỉnh quá dài!'
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

    public function updateUserInfo($requestData){
        
        $validate = $this->validateEditUser($requestData);
        if ($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors()
            ];
        }
        $dataSave = $requestData->getPost();

        $dataToSave = [
            'UserID' => $dataSave['UserID'],
            'UserEmail' => $dataSave['email'],
            'UserPassword' => password_hash( $dataSave['password'],PASSWORD_BCRYPT),
            'UserFirstName' => $dataSave['firstName'],
            'UserLastName' => $dataSave['lastName'],
            'UserCity' => $dataSave['city'],
            'UserState' => $dataSave['state'],
            'UserZip' => $dataSave['zip'],
            'UserEmailVerified' => 1, // Giả sử mặc định đã xác minh email
            'UserRegistrationDate' => date('Y-m-d H:i:s'), // Thêm ngày đăng ký
            'UserVerificationCode' =>  $this->generateRandomCode(10),
            'UserIP' => $_SERVER['REMOTE_ADDR'], // Lấy IP của người dùng
            'UserPhone' => $dataSave['phone'],
            'UserFax' => $dataSave['fax'],
            'UserCountry' => $dataSave['country'],
            'UserAddress' => $dataSave['address'],
            'UserAddress2' => $dataSave['address2'],
            'UserIsAdmin' => 0, // Giả sử không phải admin
        ];

        try{
            $this->users->save($dataToSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Sửa dữ liệu thành công']
            ];
        } catch (Exception $e){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['error' => $e->getMessage()]
            ];
        }
    }

    private function validateEditUser($requestData){
        // dd($requestData->getPost());
        $rule = [
            'email' => 'valid_email|is_unique[users.UserEmail,users.UserID,'.$requestData->getPost()['UserID'].']' ,
            'firstName' => 'max_length[30]',
            'lastName' => 'max_length[30]',
            'zip' => 'max_length[5]|numeric[users.UserZip]',
            'phone' => 'max_length[10]|min_length[10]|numeric[users.UserPhone]|is_unique[users.UserPhone,users.UserID,'.$requestData->getPost()['UserID'].']',
            'fax' => 'max_length[10]|min_length[10]|numeric[users.UserPhone]|is_unique[users.UserFax,users.UserID,'.$requestData->getPost()['UserID'].']',
            'city' => 'max_length[30]',
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
            'city' => [
                'max_length' => 'Tên hành phố quá dài!'
            ],
            'state' => [
                'max_length' => 'Tên tỉnh quá dài!'
            ],
            'address' => [
                'max_length' => 'Địa chỉ quá dài!'
            ],
            'address2' => [
                'max_length' => 'Địa chỉ 2 quá dài!'
            ],
        ];
        // if (empty($requestData->getPost()['change-password'])){
        //     $rule['password'] = 'max_length[30]|min_length[6]';
        //     $message['password'] = [
        //         'max_length' => 'Mật khẩu quá dài',
        //         'min_length' => 'Mật khẩu quá ngắn'
        //     ];
        // }
        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
            
    }
} 