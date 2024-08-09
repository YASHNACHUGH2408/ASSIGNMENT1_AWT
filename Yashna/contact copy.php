<?php
// Collect POST data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'contactus');

// Check connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `contact` (first_name, last_name, email, phone, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration Successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
