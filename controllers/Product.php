<?php
include_once('models/ProductModel.php');

class Product
{
    public $auth;
    public $custmoerModel;
    public function __construct()
    {
        $this->auth = new Auth();
        $this->productModel = new ProductModel();
    }
    public function get()
    {
        $userId = $this->auth->validateToken();
        $data = $this->productModel->getAll();
        returnResponse($data);
    }
    public function add()
    {
        $userId = $this->auth->validateToken();
        $postData = getRawInput(true);
        $productData = $this->productModel->makeDataset($postData ?? throwError(ITEM_INSERT_FAILURE, 'Product required.'));
        returnResponse($productData);
    }
}
