<?php

namespace App\Services;
use App\Models\CategoryModel;
class CategoryService extends BaseService
{
    private $category;
    function __construct(){
        parent::__construct();
        $this->category = new CategoryModel();
    }

    function getAllCategories(){
        return $this->category->findAll();
    }
}