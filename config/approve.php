<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handling card updates
    if (isset($_POST['enroll'])) {
        $id = isset($_POST['student_id']) ? $_POST['student_id'] : null;

        if ($id === null) {
            echo "Error: 'student_id' not provided in the POST request.";
            exit;
        }

        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $middleName = $_POST['middleName'];
        $gender = $_POST['gender'];
        $courseyear = $_POST['courseyear'];
        $course = $_POST['course'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $guardianname = $_POST['guardianname'];
        $guardianPhoneNumber = $_POST['guardianPhoneNumber'];
        $guardhomeaddress = $_POST['guardhomeaddress'];
        $elementary = $_POST['elementary'];
        $egrad = $_POST['egrad'];
        $juniorhigh = $_POST['juniorhigh'];
        $hgrad = $_POST['hgrad'];
        $seniorhigh = $_POST['seniorhigh'];
        $shgrad = $_POST['shgrad'];
        $status = 'enrolled'; // Set the default value to 'Enrolled'

        // Assuming your table is named 'student_data'
        $sql = "UPDATE student_data SET 
        username = ?,
        password = ?,
        firstName = ?,
        lastName = ?,
        middleName = ?,
        gender = ?,
        courseyear = ?,
        course = ?,
        birthday = ?,
        address = ?,
        phonenumber = ?,
        email = ?,
        guardianname = ?,
        guardianPhoneNumber = ?,
        guardhomeaddress = ?,
        elementary = ?,
        egrad = ?,
        juniorhigh = ?,
        hgrad = ?,
        seniorhigh = ?,
        shgrad = ?,
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
      // Bind parameters
$stmt->bind_param(
    "ssssssssssssssssssssssi",  // Adjust the type definition string here
    $username, $password, $firstName, $lastName, $middleName, $gender, 
    $courseyear, $course, $birthday, $address, $phonenumber, $email, 
    $guardianname, $guardianPhoneNumber, $guardhomeaddress, $elementary, 
    $egrad, $juniorhigh, $hgrad, $seniorhigh, $shgrad, $status, $id
);


        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<p>Card updated successfully</p>";
            header("Location: ../apointment.php");
        } else {
            echo "Error updating card: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}
?>
