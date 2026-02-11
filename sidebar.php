<?php
// Sidebar menu for all pages
?>
<div class="sidebar">
<h2>Campus Carpool</h2>
<p>Welcome, <?php echo $_SESSION["user_name"] ?? "Student"; ?></p>
<hr>
<a href="dashboard.php">🚗 Available Rides</a>
<a href="mybookings.php">📋 My Bookings</a>
<a href="logout.php">🚪 Logout</a>
</div>

<style>
.sidebar {
height: 100vh;
width: 220px;
position: fixed;
left: 0;
top: 0;
background: #1e1e2f;
color: white;
padding: 20px;
box-shadow: 2px 0 5px rgba(0,0,0,0.1);
}
.sidebar h2 {
color: white;
margin-top: 0;
}
.sidebar a {
display: block;
color: white;
padding: 12px;
margin: 10px 0;
text-decoration: none;
background: #2a2a3a;
border-radius: 5px;
}
.sidebar a:hover {
background: #ff5e1a;
}
.main-content {
margin-left: 260px;
padding: 20px;
}
</style>