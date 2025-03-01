<?php
$servername = "127.0.0.1"; 
$username = "root";
$password = "21@Jan2002";
$dbname = "contact_form";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent SQL injection
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $email_address = $conn->real_escape_string($_POST['email_address']);
    $mobile_number = $conn->real_escape_string($_POST['mobile_number']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);
    
    $stmt = $conn->prepare("INSERT INTO contacts (full_name, email_address, mobile_number, subject, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $email_address, $mobile_number, $subject, $message);

    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>