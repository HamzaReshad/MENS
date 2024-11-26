<?php
session_start();

header('Content-Type: application/json');

$host = 'localhost'; 
$dbname = 'mens'; 
$username = 'hamzukich';  
$password = 'hamzukich';  

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Username already exists.']);
    } else {
        if (empty($user) || empty($email) || empty($pass) || empty($address) || empty($city) || empty($phone)) {
            echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
        } else {
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, email, password, address, city, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $user, $email, $hashed_password, $address, $city, $phone);

            if ($stmt->execute()) {
                $_SESSION['username'] = $user;
                $_SESSION['user_id'] = $stmt->insert_id;
                header("Location:Homepage.php");
            } else {
                echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->error]);
            }
        }
    }

    $stmt->close();
}

$conn->close();
?>
