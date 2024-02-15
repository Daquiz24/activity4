<?php
require_once 'db.php';

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$captchaInput = $_POST['captchaInput'];
$serverCaptcha = $_POST['serverCaptcha'];

// Validate the captcha code
if ($captchaInput !== $serverCaptcha) {
    die("Invalid captcha code. Please try again.");
}

// Insert data into the database
$sql = "INSERT INTO contact_form_submissions (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you for contacting us! We will get back to you soon.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
