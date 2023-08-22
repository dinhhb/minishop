<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Services\OrderService;
class OrderController extends BaseController
{
    private $service;
    public function __construct(){
        $this->service = new OrderService(); 
    }
    public function list()
    {
        $data = [];
        $dataLayout['orders'] =  $this->service->getAllOrders();
        // dd($data['orders']); 
        $data = $this->loadMasterLayout($data, 'Danh sách tài khoản', 'admin/pages/order/list', $dataLayout); 
        return view('admin/main', $data) ;
    }
}
 