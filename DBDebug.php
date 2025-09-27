<?php
    require_once 'UserModel.php';

    try {
        $userModel = new UserModel();
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>