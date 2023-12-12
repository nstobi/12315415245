<?php

include '../includes/DatabaseConnection.php';

session_start();

function getPosts($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM posts ORDER BY date DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle the exception, e.g., log it or display an error message
        echo "Error: " . $e->getMessage();
        return []; // Return an empty array in case of an error
    }
}
$posts = getPosts($pdo);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Viewer</title>
    <!-- custom css -->
    <link rel="stylesheet" href="../css/posts.css">
</head>

<body>

    <header>
        <h1>Post Viewer</h1>
        <!-- Home button -->
        <div class="home-button">
            <a href="dashboard.php">Home</a>
        </div>
        <!-- Add Post button -->
        <div style="text-align: center; margin-top: 20px;">
            <a href="../templates/addpost.html.php" style="text-decoration: none; padding: 10px 20px; background-color: #4CAF50; color: white; border-radius: 5px;">Add Post</a>
        </div>
    </header>

    <main>
        <?php foreach ($posts as $post) {
        ?>
            <div class="post">
                <h2>
                    <?= htmlspecialchars($post['title']) ?>
                </h2>
                <p>
                    <?= htmlspecialchars($post['content']) ?>
                </p>
                <p><strong>Posted by:</strong>
                    <?= htmlspecialchars($post['name']) ?>
                </p>
                <p><strong>Category:</strong>
                    <?= htmlspecialchars($post['category']) ?>
                </p>
                <p><strong>Posted on:</strong>
                    <?= htmlspecialchars($post['date']) ?>
                </p>
                <!-- Display the image if it exists -->
                <?php if (!empty($post['image'])) : ?>
                    <img src="<?= htmlspecialchars($post['image']) ?>" alt="Image">
                <?php endif; ?>

                <!-- Edit Post button -->
                <a href="edit_post.php?id=<?= $post['post_id'] ?>" style="text-decoration: none; padding: 5px 10px; background-color: #007BFF; color: white; border-radius: 3px;">Edit
                    Post</a>

                <!-- Delete Post button -->
                <a href="delete_post.php?id=<?= $post['post_id'] ?>" style="text-decoration: none; padding: 5px 10px; background-color: #DC3545; color: white; border-radius: 3px; margin-left: 10px;" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</a>
            </div>
        <?php
        }
        ?>
    </main>



</body>

</html>

<?php
// Close the database connection
$pdo = null;
?>