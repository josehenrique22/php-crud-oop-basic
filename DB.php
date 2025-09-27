<?php
    class DB {
    // Volores zerados para commit, substituir pelos valores corretos. Projeto usado para estudo.
    private $host = "";
    private $user = "";
    private $pass = "";
    private $dbname = "conn_php";
    private $conn;
    
    
    public function __construct() {
        try {
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);

            if (!$this->conn) {
                throw new Exception("Connection failed: " . mysqli_connect_error());
            }

        } catch (Exception $error) {
            die("Connection error: " . $error->getMessage());
        }
        }
    

    public function getConnection() {
        if (!$this->conn) {
            throw new Exception("No active database connection.");
        }
        return $this->conn;
    }
    
    public function closeConnection() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}
?>