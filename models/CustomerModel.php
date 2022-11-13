<?php

class CustomerModel extends BaseModel
{
    public $name;
    public $email;
    public $phone;
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'customer';
    }
    public function insert()
    {
        $sql = "INSERT INTO {$this->tableName} (name, email, phone) VALUES (
            '{$this->name}',
            '{$this->email}',
            '{$this->phone}'
        )";
        $result = mysqli_query($this->dbCon, $sql);
        $insertId = mysqli_insert_id($this->dbCon);
        return $this->getById($insertId);
    }
    public function makeDataset($customer)
    {
        $this->name = $customer->name ?? throwError(ITEM_INSERT_FAILURE, 'Customer name required.');
        $this->phone = $customer->phone ?? throwError(ITEM_INSERT_FAILURE, 'Customer email required.');
        $this->email = $customer->email ?? throwError(ITEM_INSERT_FAILURE, 'Customer phone required.');
        return $this->insert();
    }
    public function assignAddress($customerId, $addressId)
    {
        $this->tableName = 'customer_address';
        $sql = "INSERT INTO {$this->tableName} (customer_id, address_id, is_active) VALUES (
            {$customerId},
            {$addressId},
            1
        )";
        $result = mysqli_query($this->dbCon, $sql);
        $insertId = mysqli_insert_id($this->dbCon);

        return $this->getById($insertId);
    }
    public function getAddress($customerId)
    {
        $sql = "SELECT a.* FROM customer_address ca 
        JOIN address a ON ca.address_id=a.id WHERE ca.customer_id={$customerId} AND ca.is_active = 1";
        $result = mysqli_query($this->dbCon, $sql);
        $data = getDataFromMysqlObject($result);
        return count($data) ? $data[0] : null;
    }
    public function getWithAddress($customerId)
    {
        $this->tableName = 'customer';
        $customer = $this->getById($customerId);
        $address = removeFields($this->getAddress($customerId));
        $customer['address'] = $address;
        return $customer;
    }
}
