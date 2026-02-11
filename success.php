<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Booking Confirmed</title>
<style>
body {
margin: 0;
font-family: Arial;
background: #f0f2f5;
}
.main-content {
margin-left: 260px;
padding: 20px;
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
}
.box {
background: white;
padding: 40px;
border-radius: 10px;
text-align: center;
box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
.check {
background: #27ae60;
color: white;
width: 60px;
height: 60px;
line-height: 60px;
font-size: 30px;
border-radius: 50%;
margin: 0 auto 20px;
}
h1 {
color: #1e1e2f;
}
.btn {
background: #ff5e1a;
color: white;
padding: 12px 25px;
text-decoration: none;
border-radius: 5px;
display: inline-block;
margin: 10px;
}
.btn:hover {
background: #e54e00;
}
.btn2 {
background: #3498db;
}
</style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="main-content">
<div class="box">
<div class="check">✓</div>
<h1>Booking Confirmed!</h1>
<p>Your ride has been booked successfully.</p>
<p style="color: #27ae60;">Thank you for riding with Campus Carpool</p>

<a href="dashboard.php" class="btn">Find More Rides</a>
<a href="mybookings.php" class="btn btn2">View My Bookings</a>
</div>
</div>

</body>
</html>