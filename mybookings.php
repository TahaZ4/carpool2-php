<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "carpool_system");
$user_id = $_SESSION["user_id"];

$sql = "SELECT b.*, r.from_location, r.to_location, r.price, r.time 
        FROM bookings b 
        JOIN rides r ON b.ride_id = r.id 
        WHERE b.user_id = $user_id 
        ORDER BY b.booked_at DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>My Bookings</title>
<style>
body {
margin: 0;
font-family: Arial;
background: #f0f2f5;
}
.main-content {
margin-left: 260px;
padding: 20px;
}
.booking-card {
background: white;
padding: 20px;
margin-bottom: 15px;
border-radius: 10px;
border-left: 5px solid #ff5e1a;
box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
h1 {
color: #1e1e2f;
}
.status {
background: #27ae60;
color: white;
padding: 5px 15px;
border-radius: 20px;
display: inline-block;
font-size: 14px;
margin-top: 10px;
}
.actions {
display: flex;
gap: 10px;
margin-top: 15px;
}
.track-btn {
background: #ff5e1a;
color: white;
padding: 8px 20px;
text-decoration: none;
border-radius: 5px;
display: inline-block;
}
.contact-btn {
background: #3498db;
color: white;
padding: 8px 20px;
text-decoration: none;
border-radius: 5px;
display: inline-block;
}
.track-btn:hover, .contact-btn:hover {
opacity: 0.9;
}
</style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="main-content">
<h1>My Bookings</h1>

<?php
if (mysqli_num_rows($result) == 0) {
echo '<p>No bookings yet.</p>';
echo '<a href="dashboard.php" style="color:#ff5e1a;">Find rides →</a>';
} else {
while($booking = mysqli_fetch_assoc($result)) {
echo '<div class="booking-card">';
echo '<h3>' . $booking["from_location"] . ' → ' . $booking["to_location"] . '</h3>';
echo '<p><strong>Price:</strong> EGP ' . $booking["price"] . '</p>';
echo '<p><strong>Time:</strong> ' . $booking["time"] . '</p>';
echo '<p><strong>Driver:</strong> Abdo Mohamed</p>';
echo '<span class="status">✓ Booking Confirmed</span>';

// added two buttons here
echo '<div class="actions">';
echo '<a href="view_location.php?id=' . $booking["ride_id"] . '" class="track-btn">📍 Track Driver</a>';
echo '<a href="#" class="contact-btn">📞 Call Driver</a>';
echo '</div>';

echo '</div>';
}
}
?>

</div>

</body>
</html>
<?php mysqli_close($conn); ?>