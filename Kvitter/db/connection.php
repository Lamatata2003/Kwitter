<?php 

//Databasens anslutnings inställningar
$servername = "127.0.0.1";
$username = "root";
$password = "password";
$database = "kwitter";

try {
    $conn = new PDO("mysql:host={$servername};dbname={$database}", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8mb4");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}