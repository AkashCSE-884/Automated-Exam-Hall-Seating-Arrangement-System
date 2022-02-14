<?php

namespace App\DbConnection;
use PDO;
use PDOException;

class DbConnection
{
    public $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=db", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
