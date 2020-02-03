<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn;

try {
    $conn = new PDO("mysql:host=localhost;dbname=blogdb", $username, $password);

} catch (Exception $e) {
    echo "Connection Failed" . $e->getMessage();
}
