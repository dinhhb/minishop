<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Services\ProductService;
class ProductController extends BaseController
{
    private $service;
    public function __construct(){
        $this->service = new ProductService(); 
    }
    public function list()
    {
        $data = [];
        $dataLayout['products'] =  $this->service->getAllProducts();
        // dd($data['products']); 
        $data = $this->loadMasterLayout($data, 'Danh sách tài khoản', 'admin/pages/product/list', $dataLayout); 
        return view('admin/main', $data) ;
    }
}
 