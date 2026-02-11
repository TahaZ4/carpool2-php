<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

$ride_id = $_GET["id"];
$conn = mysqli_connect("localhost", "root", "", "carpool_system");

$sql = "SELECT * FROM rides WHERE id = $ride_id";
$result = mysqli_query($conn, $sql);
$ride = mysqli_fetch_assoc($result);

if (!$ride) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    mysqli_query($conn, "INSERT INTO bookings (ride_id, user_id) VALUES ($ride_id, $user_id)");
    mysqli_query($conn, "UPDATE rides SET seats = seats - 1 WHERE id = $ride_id");
    header("Location: success.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Book Your Ride</title>
<style>
/* same style but added driver card */
body {
margin: 0;
font-family: Arial;
background: #f0f2f5;
}
.main-content {
margin-left: 260px;
padding: 20px;
}
.box {
background: white;
padding: 30px;
border-radius: 10px;
max-width: 500px;
margin: 0 auto;
box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
h2 {
color: #1e1e2f;
border-bottom: 2px solid #ff5e1a;
padding-bottom: 15px;
}
.detail {
margin: 15px 0;
padding: 10px;
background: #f8f9fa;
border-radius: 5px;
}
.driver-card {
background: #1e1e2f;
color: white;
padding: 15px;
border-radius: 8px;
margin: 20px 0;
display: flex;
align-items: center;
gap: 15px;
}
.driver-avatar {
background: #ff5e1a;
width: 50px;
height: 50px;
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
font-size: 24px;
}
.price {
font-size: 24px;
color: #ff5e1a;
font-weight: bold;
}
.btn {
background: #ff5e1a;
color: white;
padding: 12px 20px;
border: none;
border-radius: 5px;
cursor: pointer;
width: 100%;
font-size: 16px;
margin-top: 20px;
}
.btn:hover {
background: #e54e00;
}
.cancel {
display: block;
text-align: center;
margin-top: 15px;
color: #666;
text-decoration: none;
}
</style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="main-content">
<div class="box">
<h2>Confirm Your Ride</h2>

<div class="detail">
<strong>From:</strong> <?php echo $ride["from_location"]; ?>
</div>
<div class="detail">
<strong>To:</strong> <?php echo $ride["to_location"]; ?>
</div>
<div class="detail">
<strong>Time:</strong> <?php echo $ride["time"]; ?>
</div>

<!-- added driver info here -->
<div class="driver-card">
<div class="driver-avatar">👤</div>
<div>
<strong>Abdo Mohamed</strong><br>
⭐ 4.9 (128 rides)<br>
<span style="color: #ff5e1a;">📞 010xxxxxxx</span>
</div>
</div>

<div class="detail">
<strong>Car:</strong> Hyundai Elantra 2023 • Silver
</div>
<div class="detail">
<strong>Price:</strong> <span class="price">EGP <?php echo $ride["price"]; ?></span>
</div>

<!-- after booking they can track driver -->
<p style="background: #fff3cd; padding: 10px; border-radius: 5px; border-left: 4px solid #ffc107;">
📍 After booking, you can see driver's live location in My Bookings
</p>

<form method="POST">
<button type="submit" class="btn">Confirm Booking</button>
<a href="dashboard.php" class="cancel">Cancel</a>
</form>
</div>
</div>

</body>
</html>