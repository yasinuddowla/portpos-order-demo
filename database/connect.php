<?php

class Database
{
    public $host = 'localhost';
    public $username = 'root';
    public $password = 'yasin';
    public $database = 'portpos-payment';
    public function connect()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$conn) {
            throwError(SERVER_ERROR, 'Database connection failed');
        }
        return $conn;
    }
}
