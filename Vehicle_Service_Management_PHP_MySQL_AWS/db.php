<?php
$host = getenv('DB_HOST') ?: 'YOUR_RDS_ENDPOINT';
$user = getenv('DB_USER') ?: 'admin';
$pass = getenv('DB_PASS') ?: 'YOUR_RDS_PASSWORD';
$db   = getenv('DB_NAME') ?: 'vehicle_service';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) { die("Database connection failed: " . $conn->connect_error); }
$conn->set_charset("utf8mb4");
?>