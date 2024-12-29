<?php
session_start();
$host = 'localhost'; 
$dbname = 'mens'; 
$username = 'hamzukich';  
$password = 'hamzukich';  


$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT user_id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            
            echo json_encode(['success' => true, 'redirect' => 'HomePage.php']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Incorrect username or password']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found!']);
    }
    exit();
}


?>
