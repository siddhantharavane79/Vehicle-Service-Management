<?php
session_start();
require_once 'db.php';
$result = $conn->query("SELECT * FROM services ORDER BY id DESC");
?>
<!DOCTYPE html>
<html><head><title>Vehicle Service Management</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<nav><b>Vehicle Service Management</b><a href="index.php">Home</a><a href="book.php">Book Service</a><a href="my_bookings.php">My Bookings</a><a href="admin/login.php">Admin</a></nav>
<div class="hero"><h1>Vehicle Service Management System</h1><p>Book and manage vehicle servicing online.</p><a class="btn" href="book.php">Book a Service</a></div>
<div class="container"><h2>Available Services</h2><div class="grid">
<?php while($s=$result->fetch_assoc()): ?><div class="card"><h3><?=htmlspecialchars($s['name'])?></h3><p><?=htmlspecialchars($s['description'])?></p><b>₹<?=htmlspecialchars($s['price'])?></b></div><?php endwhile; ?>
</div></div>
</body></html>