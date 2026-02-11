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

// fake location for demo - in real project this comes from database
$driver_location = "Cairo University Main Gate";
$eta = "8 mins";
?>
<!DOCTYPE html>
<html>
<head>
<title>Track Driver</title>
<style>
/* simple clean style - not too fancy */
body {
font-family: Arial;
background: #f0f2f5;
margin: 0;
}
.main-content {
margin-left: 260px;
padding: 20px;
}
.map-box {
background: white;
padding: 25px;
border-radius: 10px;
box-shadow: 0 2px 5px rgba(0,0,0,0.1);
max-width: 600px;
margin: 0 auto;
}
.mock-map {
background: #1e1e2f;
color: white;
padding: 40px;
border-radius: 10px;
text-align: center;
margin: 20px 0;
}
.live {
background: #ff5e1a;
color: white;
padding: 5px 15px;
border-radius: 20px;
font-size: 14px;
display: inline-block;
}
.info {
background: #f8f9fa;
padding: 15px;
border-radius: 5px;
margin: 10px 0;
}
.btn {
background: #ff5e1a;
color: white;
padding: 12px 25px;
text-decoration: none;
border-radius: 5px;
display: inline-block;
margin-top: 15px;
}
</style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="main-content">
<div class="map-box">
<h2>📍 Driver Location</h2>
<span class="live">LIVE</span>

<div class="mock-map">
<div style="font-size: 50px;">🚗</div>
<h3>Driver is on the way!</h3>
<p><?php echo $driver_location; ?></p>
<p style="font-size: 20px;">⏱️ ETA: <?php echo $eta; ?></p>
</div>

<div class="info">
<p><strong>From:</strong> <?php echo $ride["from_location"]; ?></p>
<p><strong>To:</strong> <?php echo $ride["to_location"]; ?></p>
<p><strong>Driver:</strong> Abdo Mohamed • ⭐ 4.9</p>
</div>

<a href="mybookings.php" class="btn">← Back</a>
</div>
</div>

</body>
</html>