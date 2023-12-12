<?php
session_start();

include '../includes/DatabaseConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validate the submitted credentials
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Use the hashed password stored in the session during registration
        $hashedPassword = $_SESSION['hashed_password'];

        if (password_verify($password, $hashedPassword)) {
            // Password is correct, set session variables or perform other actions
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to a dashboard or other secure page
            header("Location: ../admin/dashboard.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password. Please try again.";
        }
    } else {
        // User not found
        echo "User not found. Please check your username.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!-- custom css link -->
    <link rel="stylesheet" href="../css/form.css">

</head>
<div class="form-container">
    <form action="" method="post">
        <h2>login now</h2>
        <input type="text" name="username" required placeholder="enter your username">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="submit" name="submit" value="login now" class="form-btn">
        <p>don't have an account? <a href="register_form.php">register now</a></p>
    </form>
</div>

<body>

</body>

</html>