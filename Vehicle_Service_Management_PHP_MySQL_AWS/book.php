<?php
session_start(); require_once 'db.php';
$msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $name=trim($_POST['customer_name']); $phone=trim($_POST['phone']); $vehicle=trim($_POST['vehicle']); $service=(int)$_POST['service_id']; $date=$_POST['service_date'];
 $stmt=$conn->prepare("INSERT INTO bookings(customer_name,phone,vehicle,service_id,service_date,status) VALUES(?,?,?,?,?,'Pending')");
 $stmt->bind_param("sssds",$name,$phone,$vehicle,$service,$date);
 $stmt->execute(); $msg="Booking submitted successfully. Your booking ID is ".$stmt->insert_id;
}
$services=$conn->query("SELECT * FROM services ORDER BY name");
?>
<!DOCTYPE html><html><head><title>Book Service</title><link rel="stylesheet" href="css/style.css"></head><body>
<nav><b>Vehicle Service</b><a href="index.php">Home</a><a href="book.php">Book Service</a><a href="my_bookings.php">My Bookings</a></nav>
<div class="container"><div class="formbox"><h2>Book Vehicle Service</h2><?php if($msg): ?><div class="success"><?=$msg?></div><?php endif; ?>
<form method="post"><label>Name</label><input name="customer_name" required><label>Phone</label><input name="phone" required><label>Vehicle</label><input name="vehicle" placeholder="e.g. Honda City - MH12AB1234" required><label>Service</label><select name="service_id" required><?php while($s=$services->fetch_assoc()): ?><option value="<?=$s['id']?>"><?=htmlspecialchars($s['name'])?> - ₹<?=$s['price']?></option><?php endwhile; ?></select><label>Service Date</label><input type="date" name="service_date" required><button>Submit Booking</button></form></div></div></body></html>