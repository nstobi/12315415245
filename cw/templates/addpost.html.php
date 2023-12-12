<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <h2>Add a New Post</h2>
    <form action="../admin/addpost.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="content">Content:</label>
        <textarea name="content" rows="4" required></textarea><br>

        <select name="category">
            <option value="">Select Category</option>
            <option value="nature">nature</option>
            <option value="education">education</option>
            <option value="business">business</option>
            <option value="news">news</option>
            <option value="gaming">gaming</option>
            <option value="sports">sports</option>
            <option value="design">design</option>
            <option value="fashion">fashion</option>
            <option value="travel">travel</option>
        </select>
        <label for="image">Choose an image:</label>
        <input type="file" name="image" id="image" accept="image/*">
        <input type="submit" value="Add Post">
    </form>
</body>
</html>