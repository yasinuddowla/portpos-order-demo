<?php

class OrderModel extends BaseModel
{
    public $customerId;
    public $productId;
    public $amount;
    public $paymentUrl;
    public $status;
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'order';
    }
    public function insert()
    {
        $sql = "INSERT INTO {$this->tableName} (customer_id, product_id, amount, payment_url, status) VALUES (
            '{$this->customerId}',
            '{$this->productId}',
            '{$this->amount}',
            '{$this->paymentUrl}',
            '{$this->status}'
        )";
        $result = mysqli_query($this->dbCon, $sql);
        return getDataFromMysqlObject($result);
    }
}
