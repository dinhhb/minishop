<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Services\CategoryService;
class CategoryController extends BaseController
{
    private $service;
    public function __construct(){
        $this->service = new CategoryService(); 
    }
    public function list()
    {
        $data = [];
        $dataLayout['categories'] =  $this->service->getAllCategories();
        // dd($data['categories']); 
        $data = $this->loadMasterLayout($data, 'Danh sách tài khoản', 'admin/pages/category/list', $dataLayout); 
        return view('admin/main', $data) ;
    }
}
 