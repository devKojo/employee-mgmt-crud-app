<?php
try {
    $sql = 'SELECT * FROM employees';
    $result = $connection->query($sql)->fetchAll();

    if(count($result) > 0){
        $_SESSION["getAllUsers"] = $result;
    }else{
        $_SESSION["getAllUsers"] = [];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}



