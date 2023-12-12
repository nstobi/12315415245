<?php
include '../includes/DatabaseConnection.php';

session_start();

// Check if the post ID is provided in the URL
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Fetch the post details from the database based on the provided ID
    try {
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id = :post_id");
        $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the post exists
        if (!$post) {
            echo "Post not found.";
            exit;
        }
    } catch (PDOException $e) {
        // Handle the exception, e.g., log it or display an error message
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    echo "Post ID not provided.";
    exit;
}

// Close the database connection
$pdo = null;
?>

<!-- HTML and form for editing the post -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit.css">
</head>

<body>
    <h1>Edit Post</h1>
    <form action="update_post.php" method="post">
        <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $post['name'] ?>" required>
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= $post['title'] ?>" required>
        <label for="content">Content:</label>
        <textarea name="content" rows="4" required><?= $post['content'] ?></textarea>
        <label for="category">Category:</label>
        <select name="category">
            <option value="nature" <?= ($post['category'] == 'nature') ? 'selected' : '' ?>>Nature</option>
            <option value="education" <?= ($post['category'] == 'education') ? 'selected' : '' ?>>Education</option>
            <option value="business" <?= ($post['category'] == 'business') ? 'selected' : '' ?>>Business</option>
            <option value="news" <?= ($post['category'] == 'news') ? 'selected' : '' ?>>News</option>
            <option value="gaming" <?= ($post['category'] == 'gaming') ? 'selected' : '' ?>>Gaming</option>
            <option value="sports" <?= ($post['category'] == 'sports') ? 'selected' : '' ?>>Sports</option>
            <option value="design" <?= ($post['category'] == 'design') ? 'selected' : '' ?>>Design</option>
            <option value="fashion" <?= ($post['category'] == 'fashion') ? 'selected' : '' ?>>Fashion</option>
            <option value="travel" <?= ($post['category'] == 'travel') ? 'selected' : '' ?>>Travel</option>
        </select>
        <!-- Input field for image upload -->
        <label for="image">Image:</label>
        <input type="file" name="image">
        <button type="submit">Update Post</button>
    </form>
</body>
</html>