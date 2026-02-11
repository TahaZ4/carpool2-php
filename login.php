<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "carpool_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        // THIS LINE VERIFIES THE HASHED PASSWORD
        if (password_verify($password, $user['password'])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: index.php?error=login");
            exit();
        }
    } else {
        header("Location: index.php?error=login");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
