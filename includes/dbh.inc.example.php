<?php

$host = '';
$dbname = '';
$dbusername = '';
$dbpassword = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Returns rows with column names only
    
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Database connection failed.");
}