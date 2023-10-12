<?php
class Database 
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "OnlineCarDrivingSchoolManagementSystemtp";
    private $conn;
    

    public function __construct() 
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            throw new Exception("Database connection failed: " . $this->conn->connect_error);
        }
    }
    public function getAll($query)
    {
       return $this->conn->query($query);
    }
    
    public function executeQuery($sql, $params = [])
     {
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            throw new Exception("Error in query: " . $this->conn->error);
        }
    
        if (!empty($params)) {
            $types = str_repeat('s', count($params)); // Assuming all parameters are strings
            if (!$stmt->bind_param($types, ...$params)) {
                throw new Exception("Error binding parameters: " . $stmt->error);
            }
        }
    
        if (!$stmt->execute()) {
            throw new Exception("Error executing query: " . $stmt->error);
        }
    
        return $stmt;
    }
    

    public function close() {
        $this->conn->close();
    }
}
