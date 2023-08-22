<?php

namespace App\Services;
use App\Models\ProductModel;
class ProductService extends BaseService
{
    private $product;
    function __construct(){
        parent::__construct();
        $this->product = new ProductModel();
    }

    function getAllProducts(){
        return $this->product->findAll();
    }
}