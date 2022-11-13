<?php
include_once('models/CustomerModel.php');
include_once('models/OrderModel.php');
include_once('models/ProductModel.php');
include_once('libraries/Payment.php');

class Order
{
    public $auth;
    public function __construct()
    {
        $this->auth = new Auth();
        $this->customerModel = new CustomerModel();
        $this->orderModel = new OrderModel();
        $this->productModel = new ProductModel();
        $this->payment = new Payment;
    }
    public function add()
    {
        $userId = $this->auth->validateToken();
        $postData = getRawInput();
        $customerId = $postData['customer_id'];
        $productId = $postData['product_id'];
        $amount = $postData['amount'];
        $product = $this->productModel->getBasicInfo($productId);
        $customer = $this->customerModel->getWithAddress($customerId);
        $orderData = [
            'order' => [
                'amount' => $amount,
                'currency' => 'BDT',
                "redirect_url" => "http://localhost:8000/payment/complete/",
                "ipn_url" => "http://localhost:8000/payment/status/update/"
            ],
            'product' => $product,
            'billing' => [
                'customer' => removeFields($customer)
            ]
        ];
        $payment = $this->payment->makeOrder($orderData);
        $order = [
            'customer_id' => $customerId,
            'product_id' => $productId,
            'amount' => $amount,
            'invoice_id' => $payment['invoice_id'],
            'payment_url' => $payment['payment_url'],
            'status' => ORDER_PENDING
        ];

        $inserttedOrder = $this->orderModel->makeDataset($order);

        returnResponse($inserttedOrder);
    }
}
