<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $admin_username = "admin";
    $admin_password = "admin";

   
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    if ($username === $admin_username && $password === $admin_password) {
        
        $_SESSION['admin_id'] = true;
        header("Location: homepage.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../CSS/admin_login.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
