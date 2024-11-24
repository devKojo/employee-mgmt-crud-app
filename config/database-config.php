<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";


try {
    $connection = new PDO("mysql:host=$servername;dbname=employee_management", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return "Connected successfully";
  } catch(PDOException $e) {
    return "Connection failed: " . $e->getMessage();
  }




