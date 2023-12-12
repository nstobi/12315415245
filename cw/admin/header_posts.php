<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <div class="logo-container">
            <h1 class="logo">Tobi</h1>
            <?php
            // Check if the user is logged in
            session_start();
            ?>
        </div>
        <nav>
            <ul class="nav_links">
                <li><a href="#">Home</a></li>
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<li><a href="addpost.php">Add Post</a></li>';
                }
                ?>
                <li><a href="admin/login_form.php">Login</a></li>
                <li><a href="#">About</a></li>
                <?php echo '<li>Welcome, ' . $_SESSION['user']['username'] . '!</li>'; ?>
            </ul>
        </nav>
        <a href="#" class="cta"><button>Contact</button></a>
    </header>
</body>

</html>