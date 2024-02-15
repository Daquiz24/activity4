<?php
require_once 'config/db.php';

try {
    $query = "SELECT egrades.*, subject.*, student_data.* 
              FROM egrades
              INNER JOIN subject ON egrades.course = subject.course
              INNER JOIN student_data ON egrades.courseyear = student_data.courseyear";

    $result = $conn->query($query);

    // Fetch the results
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Access the columns from the result
        $egradesPrelim = $row['prelim'];
        $subjectName = $row['subject'];
        $studentFirstName = $row['firstName'];

        // Do something with the data...
        echo "Egrades Prelim: $egradesPrelim, Subject Name: $subjectName, Student First Name: $studentFirstName <br>";
    }
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

$conn = null;
?>
