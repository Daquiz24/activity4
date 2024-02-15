<?php
require_once 'db.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addsub'])) {
    // Retrieve form data
    $subject = $_POST['subject'];
    $course = $_POST['course'];
    $instructor = $_POST['instructor'];
    $courseyear = $_POST['courseyear'];
    $hours = $_POST['hours'];

    // Insert data into the database
    $insertQuery = "INSERT INTO subjects (subject, course, instructor, courseyear, hours) VALUES ('$subject', '$course', '$instructor', '$courseyear', $hours)";

    if ($conn->query($insertQuery) === TRUE) {
        header("Location: ../apointment.php");
    } else {
        echo "Error adding subject: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
