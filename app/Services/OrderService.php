<?php

namespace App\Services;
use App\Models\OrderModel;
class OrderService extends BaseService
{
    private $order;
    function __construct(){
        parent::__construct();
        $this->order = new OrderModel();
    }

    function getAllOrders(){
        return $this->order->findAll();
    }
}