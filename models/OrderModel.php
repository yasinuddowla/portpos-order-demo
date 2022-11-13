<?php

class OrderModel extends BaseModel
{
    public $customerId;
    public $productId;
    public $amount;
    public $invoiceId;
    public $paymentUrl;
    public $status;
    public function __construct()
    {
        parent::__construct();
        $this->tableName = '`order`';
    }
    public function insert()
    {
        $sql = "INSERT INTO {$this->tableName} (customer_id, product_id, amount, invoice_id, payment_url, status) VALUES (
            '{$this->customerId}',
            '{$this->productId}',
            '{$this->amount}',
            '{$this->invoiceId}',
            '{$this->paymentUrl}',
            '{$this->status}'
        )";
        $result = mysqli_query($this->dbCon, $sql);
        $insertId = mysqli_insert_id($this->dbCon);
        return $this->getById($insertId);
    }
    public function makeDataset($order)
    {
        $this->customerId = $order['customer_id'];
        $this->productId = $order['product_id'];
        $this->amount = $order['amount'];
        $this->invoiceId = $order['invoice_id'];
        $this->paymentUrl = $order['payment_url'];
        $this->status = $order['status'];
        return $this->insert();
    }
    public function updateStatusById($orderId, $status)
    {
        $sql = "UPDATE {$this->tableName} SET status='{$status}' WHERE id= {$orderId}";
        $result = mysqli_query($this->dbCon, $sql);
        $this->addOrderStatus($orderId, $status);
        return $this->getById($orderId);
    }
    public function addOrderStatus($orderId, $status)
    {
        $sql = "INSERT INTO `order_status` (order_id, status) VALUES ({$orderId}, '{$status}')";
        $result = mysqli_query($this->dbCon, $sql);
        $insertId = mysqli_insert_id($this->dbCon);
        return true;
    }
}
