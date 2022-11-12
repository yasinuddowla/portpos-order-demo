<?php

class AddressModel extends BaseModel
{
    public $street;
    public $city;
    public $state;
    public $zipcode;
    public $country;
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'address';
    }
    public function insert()
    {
        $sql = "INSERT INTO {$this->tableName} (street, city, state, zipcode, country) VALUES (
            '{$this->street}',
            '{$this->city}',
            '{$this->state}',
            '{$this->zipcode}',
            '{$this->country}'
        )";
        $result = mysqli_query($this->dbCon, $sql);
        $insertId = mysqli_insert_id($this->dbCon);
        return $this->getById($insertId);
    }
    public function makeDataset($address)
    {
        $this->street = $address->street ?? throwError(ITEM_INSERT_FAILURE, 'Customer street required.');
        $this->city = $address->city ?? throwError(ITEM_INSERT_FAILURE, 'Customer city required.');
        $this->state = $address->state ?? throwError(ITEM_INSERT_FAILURE, 'Customer state required.');
        $this->zipcode = $address->zipcode ?? throwError(ITEM_INSERT_FAILURE, 'Customer zipcode required.');
        $this->country = $address->country ?? throwError(ITEM_INSERT_FAILURE, 'Customer country required.');
        return $this->insert();
    }
}
