<?php
    require_once 'DB.php';
    class UserModel {
        private $db;

        public function __construct() {
            $this->db = new DB();  
        }

        public function insert($name, $email) {
            try {
                $conn = $this->db->getConnection();
                $query = "INSERT INTO users (user_name, email) VALUES (?, ?)";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "ss", $name, $email);

                $result = mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);  

                return $result;
            } catch (Exception $e) {
                throw new Exception("Insert error: " . $e->getMessage());
            }
        }

        public function fetchAll() {
            try {
                $conn = $this->db->getConnection();
                $query = "SELECT * FROM users";
                $result = mysqli_query($conn, $query);

                $users = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $users[] = $row;
                }

                mysqli_free_result($result);  
                return $users;
            } catch (Exception $e) {
                throw new Exception("Fetch error: " . $e->getMessage());
            }
        }

        public function fetchByName($name) {
            try {
                $conn = $this->db->getConnection();
                $query = "SELECT * FROM users WHERE user_name = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "s", $name);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                $users_name = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $users_name[] = $row;
                
                }

                mysqli_stmt_close($stmt);
                mysqli_free_result($result);
                return $users_name;
            } catch (Exception $e) {
                throw new Exception("Fetch by name error: " . $e->getMessage());
            }
        }

        public function __destruct() {
            $this->db->closeConnection();
        }
    }
?>