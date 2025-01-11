<?php
$host = 'localhost'; // Your database host
$db = 'aghali-finance'; // Your database name
$user = 'root'; // Your database username
$password = ''; // Your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
