<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Campus Carpool - Coventry Egypt</title>
<style>
body {
font-family: Arial;
background: #ff5e1a;
margin: 0;
height: 100vh;
display: flex;
align-items: center;
justify-content: center;
}
.login-container {
display: flex;
max-width: 900px;
width: 90%;
background: white;
border-radius: 15px;
overflow: hidden;
box-shadow: 0 10px 40px rgba(0,0,0,0.2);
}
.image-side {
flex: 1;
background: url('https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
background-size: cover;
background-position: center;
position: relative;
display: flex;
align-items: center;
justify-content: center;
min-height: 450px;
}
.overlay {
position: absolute;
top: 0;
left: 0;
right: 0;
bottom: 0;
background: rgba(30, 30, 47, 0.85);
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
color: white;
padding: 30px;
text-align: center;
}
.overlay h1 {
font-size: 42px;
margin-bottom: 15px;
color: #ff5e1a;
}
.overlay p {
font-size: 18px;
margin-bottom: 20px;
}
.university-badge {
background: #ff5e1a;
padding: 10px 25px;
border-radius: 50px;
font-weight: bold;
display: inline-block;
}
.form-side {
flex: 1;
padding: 50px;
background: white;
}
.form-side h2 {
color: #1e1e2f;
margin-bottom: 10px;
}
.form-side p {
color: #666;
margin-bottom: 30px;
}
input {
width: 100%;
padding: 12px;
margin: 10px 0;
border: 1px solid #ddd;
border-radius: 5px;
box-sizing: border-box;
}
button {
width: 100%;
padding: 12px;
background: #ff5e1a;
color: white;
border: none;
border-radius: 5px;
cursor: pointer;
font-size: 16px;
font-weight: bold;
}
button:hover {
background: #e54e00;
}
.demo {
background: #f8f9fa;
padding: 15px;
margin-top: 25px;
border-radius: 5px;
font-size: 14px;
border-left: 4px solid #ff5e1a;
}
.demo strong {
color: #ff5e1a;
}
.error {
background: #ffebee;
color: #c62828;
padding: 12px;
border-radius: 5px;
margin-bottom: 20px;
border-left: 4px solid #c62828;
}
a {
color: #ff5e1a;
text-decoration: none;
font-weight: bold;
}
.register-link {
text-align: center;
margin-top: 20px;
}
@media (max-width: 768px) {
.login-container {
flex-direction: column;
}
.image-side {
min-height: 200px;
}
}
</style>
</head>
<body>

<div class="login-container">
    <!-- LEFT SIDE - COVENTRY IMAGE -->
    <div class="image-side">
        <div class="overlay">
            <h1>COVENTRY<br>EGYPT</h1>
            <p>Campus Carpool</p>
            <div class="university-badge">
                🚗 Students Only
            </div>
        </div>
    </div>
    
    <!-- RIGHT SIDE - LOGIN FORM -->
    <div class="form-side">
        <h2>Welcome Back</h2>
        <p>Login to book your ride</p>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="error">❌ Wrong email or password</div>
        <?php endif; ?>
        
        <form method="POST" action="login.php">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login →</button>
        </form>
        
        <div class="demo">
            <strong>🎓 Demo Account:</strong><br>
            Email: student@campus.edu<br>
            Password: 123456<br>
            <span style="color: #27ae60; font-size: 12px;">✓ Passwords are hashed in database</span>
        </div>
        
        <div class="register-link">
            New student? <a href="register.php">Sign up here</a>
        </div>
    </div>
</div>

</body>
</html>