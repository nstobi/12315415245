<?php
include '../includes/DatabaseConnection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Check if all required fields are set
        if (!isset($_POST['post_id'], $_POST['name'], $_POST['title'], $_POST['content'], $_POST['category'])) {
            throw new Exception("All fields are required");
        }
        // Prepare the SQL statement for updating the post
        $stmt = $pdo->prepare("UPDATE posts 
                               SET name = :name, title = :title, content = :content, category = :category 
                               WHERE post_id = :post_id");

        // Sanitize and bind parameters
        $postId = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
        $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);

        $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        // Redirect to a success page or wherever you want
        header('Location: posts.php');
        exit();
    } catch (PDOException | Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
