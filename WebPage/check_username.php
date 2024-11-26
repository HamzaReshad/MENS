<?php

$host = 'localhost'; 
$dbname = 'mens'; 
$username = 'hamzukich';  
$password = 'hamzukich';  


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['username'])) {
    $user = $_POST['username'];

    
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    
    if ($stmt->num_rows > 0) {
        echo "exists";
    } else {
        echo "available";
    }

    $stmt->close();
}

$conn->close();
?>
