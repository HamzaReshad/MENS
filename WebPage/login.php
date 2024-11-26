<?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        header("Location: HomePage.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/Login.css">
</head>
<body>
    <h2>Login</h2>
    <form action="authenticate.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>

    
    <p class="signup-text">Don't have an account? <a href="signup.html">Sign up here</a></p>
</body>
</html>
