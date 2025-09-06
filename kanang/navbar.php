<?php
$host = 'localhost';
$db = 'kanang';
$user = 'missIT';
$pass = 'nakaeyeglass';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Enable exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
