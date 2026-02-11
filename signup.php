<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "carpool_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // THIS LINE HASHES THE PASSWORD
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($check) > 0) {
        $error = "Email already registered";
    } else {
        // USING HASHED PASSWORD
        $sql = "INSERT INTO users (email, password, name) VALUES ('$email', '$hashed_password', '$name')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION["user_id"] = mysqli_insert_id($conn);
            $_SESSION["user_name"] = $name;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Registration failed";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up - Campus Carpool</title>
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
.box {
background: white;
padding: 40px;
border-radius: 10px;
width: 350px;
}
h1 {
color: #ff5e1a;
text-align: center;
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
}
.error {
background: #ffebee;
color: #c62828;
padding: 10px;
border-radius: 5px;
margin-bottom: 15px;
}
.login-link {
text-align: center;
margin-top: 20px;
}
.login-link a {
color: #ff5e1a;
text-decoration: none;
}
</style>
</head>
<body>
<div class="box">
<h1>Campus Carpool</h1>
<p style="text-align: center;">Create your account</p>

<?php if ($error): ?>
<div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<form method="POST">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Sign Up</button>
</form>

<div class="login-link">
Already have an account? <a href="index.php">Login here</a>
</div>
</div>
</body>
</html>
