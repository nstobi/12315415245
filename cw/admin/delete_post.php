<?php

include '../includes/DatabaseConnection.php';

session_start();

// Function to delete a post by ID
function deletePost($pdo, $postId)
{
    try {
        $stmt = $pdo->prepare("DELETE FROM posts WHERE post_id = :id");
        $stmt->bindParam(':id', $postId, PDO::PARAM_INT);
        $stmt->execute();
        // Return true if the deletion is successful
        return true;
    } catch (PDOException $e) {
        // Handle the exception, e.g., log it or display an error message
        echo "Error: " . $e->getMessage();
        return false; // Return false in case of an error
    }
}

// Check if the post ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the post ID from the URL
    $postId = $_GET['id'];

    // Delete the post
    if (deletePost($pdo, $postId)) {
        // Redirect to the post viewer page after successful deletion
        header("Location: posts.php");
        exit();
    }
}

?>
