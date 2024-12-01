<?php
include __DIR__ . "/../../config/database-config.php";

$dashboard = "location: ../resources/views/dashboard.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST["password"];
    try {
        $sql = "SELECT * FROM employees WHERE email = ? && password = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([ $email, $password]);
        
        $user = $stmt->fetch();
        $_SESSION["user"] = $user;
        if ($user) {
            header($dashboard);
        } else {
            echo "Invalid email or password.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
} else {
    echo "Invalid request.";
}
?>
