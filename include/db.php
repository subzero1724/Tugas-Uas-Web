<?php
class Database {
    private $servername = "localhost:3306";
    private $username = "root";
    private $password = "";
    private $database = "peweb";
    public $conn;

    // Constructor to establish the connection
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to close the connection
    public function closeConnection() {
        $this->conn->close();
    }

    // Method to execute a query
    public function executeQuery($sql) {
        $result = $this->conn->query($sql);

        // Check for errors
        if (!$result) {
            die("Query failed: " . $this->conn->error);
        }

        return $result;
    }
}
?>