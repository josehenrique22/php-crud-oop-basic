<?php 
    require_once 'UserModel.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];

        try {
            $userModel = new UserModel();
            $result = $userModel->insert($name, $email);

            if ($result) {
                echo "User inserted successfully.";
            } else {
                echo "Failed to insert user.";
            }
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }
?>