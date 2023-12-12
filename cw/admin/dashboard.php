<?php
// Start the session
session_start();

// Check if the user array is set in the session
if (!isset($_SESSION['user'])) {
    // Redirect to the login page if not set
    header("Location: login_form.php");
    exit();
}

// Access user information from the session
$user = $_SESSION['user'];

// Access the username and other user details from the user array
$username = $user['username'];
$userType = $user['user_type'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <header>
        <h1 class="logo">Tobi</h1>
        <nav>
            <ul class="nav_links">
                <li><a href="#">Home</a></li>
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['user'])) {
                    // Display "Add Post" button if the user is logged in
                    echo '<li><a href="posts.php">Posts</a></li>';
                }
                ?>
                <li><a href="../admin/logout.php">Logout</a></li>
                <li><a href="#">About</a></li>
                <?php echo '<li>Welcome, ' . $_SESSION['user']['username'] . '!</li>'; ?>
            </ul>
        </nav>
        <a href="../mail/contact.php" class="cta"><button>Contact</button></a>
    </header>
    <div class="content">
        <h1>TOBI</h1>
        <p>Place to share your posts/questions</p>
    </div>
</body>

</html>