<?php

class BaseModel
{
    public $tableName;
    public function __construct()
    {
        $this->auth = new Auth();
        $db = new Database;
        $this->dbCon = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        $result = mysqli_query($this->dbCon, $sql);
        return getDataFromMysqlObject($result);
    }
    public function getById($id = 0)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = {$id}";
        $result = mysqli_query($this->dbCon, $sql);
        $data = getDataFromMysqlObject($result);
        return count($data) ? $data[0] : null;
    }
}
