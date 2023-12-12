<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="send.php" method="post">
        Email <input type="email" name="email" value=""> <br>
        Subject <input type="text" name="subject" value=""> <br>
        Message <input type="text" name="message" value=""> <br>
        <button type="submit" name="send">Send</button>

        <!-- Button to Dashboard -->
        <a href="../admin/dashboard.php" style="text-decoration: none; padding: 10px 20px; background-color: #007BFF; color: white; border-radius: 5px; margin-top: 10px; display: inline-block;">Go to Dashboard</a>
    </form>
</body>

</html>