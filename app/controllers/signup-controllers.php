<?php

include __DIR__ . "/../../config/database-config.php";



$error_page = 'location: ../resources/error.php';
$login_page = 'location: ../resources/views/login.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_SPECIAL_CHARS);
    $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST["password"];

    if($first_name && $last_name && $email && $phone && $department && $role && $password){
        try {
            $sql = "INSERT INTO employees (firstName, lastName, email, phone, department, role, password)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $connection->prepare($sql);
            $stmt->execute([$first_name, $last_name, $email, $phone, $department, $role, $password]);
    
            $data = $stmt->fetchAll();
            if($data){
                $_SESSION["getAllUsers"] = $data;
                header($login_page);
            }
            else{
                echo "No data available";
                header($login_page);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    header($error_page);
}

$conn = null;
?>
