<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handling card updates
    if (isset($_POST['drop'])) {
        $id = isset($_POST['student_id']) ? $_POST['student_id'] : null;

        if ($id === null) {
            echo "Error: 'student_id' not provided in the POST request.";
            exit;
        }

        $status = 'drop'; // Set the status to 'reject'

        // Assuming your table is named 'student_data'
        $sql = "UPDATE student_data SET 
        status = ? 
        WHERE id = ?";

        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        // Check if the prepared statement was successful
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            exit;
        }

        // Bind parameters
        $stmt->bind_param("si", $status, $id);

        // Execute the prepared statement
        if ($stmt->execute()) {
            
            header("Location: ../apointment.php");
        } else {
            echo "Error updating card: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}
?>
