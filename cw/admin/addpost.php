<?php
// Include the database connection file
include '../includes/DatabaseConnection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Check if all required fields are set
        if (!isset($_POST['name'], $_POST['title'], $_POST['content'], $_POST['category'])) {
            throw new Exception("All fields are required");
        }

        // Check if an image file is uploaded
        if (!empty($_FILES['image']['name'])) {
            // Process the uploaded image
            $targetDir = "uploads/";

            // Create the "uploads" directory if it doesn't exist
            if (!is_dir($targetDir) && !mkdir($targetDir, 0777, true)) {
                throw new Exception("Failed to create the 'uploads' directory.");
            }

            $targetFile = $targetDir . basename($_FILES['image']['name']);

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                // Insert the data into the database
                $stmt = $pdo->prepare("INSERT INTO posts (name, title, content, category, image, date) 
                                      VALUES (:name, :title, :content, :category, :image, :date)");

                // Bind parameters
                $stmt->bindParam(':name', $_POST['name']);
                $stmt->bindParam(':title', $_POST['title']);
                $stmt->bindParam(':content', $_POST['content']);
                $stmt->bindParam(':category', $_POST['category']);
                $stmt->bindParam(':image', $targetFile);
                $date = date("Y-m-d");
                $stmt->bindParam(':date', $date);

                // Execute the statement
                $stmt->execute();

                // Redirect to a success page or wherever you want
                header('Location: success.php');
                exit();
            } else {
                echo "Error uploading file.";
            }
        };
    } catch (PDOException | Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
