<?php
include_once('models/CustomerModel.php');
include_once('models/OrderModel.php');
include_once('models/ProductModel.php');

class Order
{
    public $auth;
    public function __construct()
    {
        $this->auth = new Auth();
        $this->custmoerModel = new CustomerModel();
        $this->orderModel = new OrderModel();
        $this->productModel = new ProductModel();
    }
    public function add()
    {
        $userId = $this->auth->validateToken();
        $postData = getRawInput(true);
        // needs rework
        $orderData = $this->productModel->makeDataset($postData->product ?? throwError(ITEM_INSERT_FAILURE, 'Product required.'));

        returnResponse($orderData);
    }
}
