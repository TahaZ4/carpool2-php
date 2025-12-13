<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = strtolower(trim($_POST["email"] ?? ""));
    $password = $_POST["password"] ?? "";

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($password) >= 6) {
        try {
            $pdo = new PDO(
                "mysql:host=localhost;dbname=carpool_app;charset=utf8mb4",
                "root",
                "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare(
                "INSERT INTO users (email, password) VALUES (?, ?)"
            );
            $stmt->execute([$email, $hash]);

            header("Location: login.php");
            exit;
        } catch (PDOException $e) {
            $error = "Email already exists";
        }
    } else {
        $error = "Invalid input";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
</head>
<body>

<h2>Sign Up</h2>

<?php if (!empty($error)): ?>
<p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password (min 6)" required><br><br>
    <button type="submit">Sign Up</button>
</form>

<p><a href="login.php">Back to login</a></p>

</body>
</html>
