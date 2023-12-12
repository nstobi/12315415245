<?php
// Include your database connection
include('../includes/DatabaseConnection.php');

try {
    // Check if post_id is set and is a valid number
    if (isset($_GET['post_id']) && is_numeric($_GET['post_id'])) {
        $post_id = $_GET['post_id'];

        // Prepare and execute the SQL query to fetch the post
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id = :post_id");
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Fetch the post data
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $name = $row['name'];
            $title = $row['title'];
            $content = $row['content'];
            $category = $row['category'];
            $image = $row['image'];
            $date = $row['date'];

            // Display the post details
            echo "<h1>$title</h1>";
            echo "<p>By $name | $date | Category: $category</p>";
            echo "<img src='$image' alt='Post Image'>";
            echo "<p>$content</p>";
        } else {
            echo "No post found with the given ID.";
        }
    } else {
        echo "Invalid post ID.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
