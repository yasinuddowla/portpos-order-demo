<?php

class ProductModel extends BaseModel
{
    public $name;
    public $details;
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'product';
    }
    public function insert()
    {

        $sql = "INSERT INTO {$this->tableName} (name, details) VALUES (
            '{$this->name}',
            '{$this->details}'
        )";
        $result = mysqli_query($this->dbCon, $sql);
        $insertId = mysqli_insert_id($this->dbCon);
        return $this->getById($insertId);
    }
    public function makeDataset($product)
    {
        $this->name = $product->name ?? throwError(ITEM_INSERT_FAILURE, 'Product name required.');
        $this->details = $product->details ?? throwError(ITEM_INSERT_FAILURE, 'Product details required.');
        return $this->insert();
    }
    public function getBasicInfo($id)
    {
        $data = $this->getById($id);
        if (!$data) return null;
        return [
            'name' => $data['name'],
            'description' => $data['details']
        ];
    }
}
