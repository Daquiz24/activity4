<?php
// Assuming you have a database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve form data
    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $course = $_POST['course'];
    $instructor = $_POST['instructor'];
    $courseyear = $_POST['courseyear'];
    $hours = $_POST['hours'];

    // Update data in the database
    $updateQuery = "UPDATE subjects SET subject=?, course=?, instructor=?, courseyear=?, hours=? WHERE id=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssssii", $subject, $course, $instructor, $courseyear, $hours, $id);

    if ($stmt->execute()) {
        header("Location: ../apointment.php"); // Redirect to the desired page after updating
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>
