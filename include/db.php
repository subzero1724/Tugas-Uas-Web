<?php
class Database {
    private $servername = "localhost:3306";
    private $username = "root";
    private $password = "";
    private $database = "peweb";
    public $conn;

    // Constructor untuk membuat koneksi
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Metode untuk menutup koneksi
    public function closeConnection() {
        $this->conn->close();
    }

    // Metode untuk mengeksekusi kueri
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
