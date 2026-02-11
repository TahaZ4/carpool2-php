<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "carpool_system");
$sql = "SELECT * FROM rides WHERE seats > 0";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Available Rides</title>
<style>
/* same style as before, just cleaner */
body {
margin: 0;
font-family: Arial;
background: #f0f2f5;
}
.main-content {
margin-left: 260px;
padding: 20px;
}
.ride-card {
background: white;
padding: 20px;
margin-bottom: 15px;
border-radius: 10px;
box-shadow: 0 2px 5px rgba(0,0,0,0.1);
border: 1px solid #eee;
}
.price {
font-size: 24px;
color: #ff5e1a;
font-weight: bold;
}
.book-btn {
background: #ff5e1a;
color: white;
padding: 10px 20px;
text-decoration: none;
border-radius: 5px;
display: inline-block;
margin-top: 10px;
}
.book-btn:hover {
background: #e54e00;
}
.seats {
background: #27ae60;
color: white;
padding: 3px 10px;
border-radius: 20px;
font-size: 13px;
display: inline-block;
}
h1 {
color: #1e1e2f;
}
</style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="main-content">
<h1>Available Rides</h1>

<?php
while($ride = mysqli_fetch_assoc($result)) {
echo '<div class="ride-card">';
echo '<div class="price">EGP ' . $ride["price"] . '</div>';
echo '<h3>' . $ride["from_location"] . ' → ' . $ride["to_location"] . '</h3>';
echo '<p>🕒 ' . $ride["time"] . ' • <span class="seats">' . $ride["seats"] . ' seats left</span></p>';
echo '<p>👤 Abdo Mohamed • ⭐ 4.9 • 📱 Hyundai Elantra 2023</p>';
echo '<a href="book.php?id=' . $ride["id"] . '" class="book-btn">Book This Ride</a>';
echo '</div>';
}
?>

</div>

</body>
</html>
<?php mysqli_close($conn); ?>
