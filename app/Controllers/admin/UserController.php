<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Services\UserService;
class UserController extends BaseController
{
    private $service;
    public function __construct(){
        $this->service = new UserService(); 
    }
    public function list()
    {
        $data = [];
        $dataLayout['users'] =  $this->service->getAllUsers();
        // dd($data['users']); 
        $data = $this->loadMasterLayout($data, 'Danh sách tài khoản', 'admin/pages/user/list', $dataLayout); 
        return view('admin/main', $data) ;
    }

    public function add(){
        $data = [];
        $data = $this->loadMasterLayout($data, 'Thêm tài khoản', 'admin/pages/user/add'); 
        return view('admin/main', $data) ;
    }

    public function create(){
        $result = $this->service->addUserInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
    }
}
 