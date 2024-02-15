<?php
require_once 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $courseyear = $_POST['courseyear'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $guardianname = $_POST['guardianname'];
    $guardianPhoneNumber = $_POST['guardianPhoneNumber'];
    $guardianadress = $_POST['guardianadress'];
    $elementary = $_POST['elementary'];
    $egrad = $_POST['egrad'];
    $juniorhigh = $_POST['juniorhigh'];
    $hgrad = $_POST['hgrad'];
    $seniorhigh = $_POST['seniorhigh'];
    $shgrad = $_POST['shgrad'];

    // Prepare and execute the update query
    $updateQuery = "UPDATE student_data SET 
                    firstName='$firstName', 
                    middleName='$middleName', 
                    lastName='$lastName', 
                    gender='$gender', 
                    course='$course', 
                    courseyear='$courseyear', 
                    birthday='$birthday', 
                    address='$address', 
                    phonenumber='$phonenumber', 
                    email='$email', 
                    guardianname='$guardianname', 
                    guardianPhoneNumber='$guardianPhoneNumber', 
                    guardhomeaddress='$guardianadress', 
                    elementary='$elementary', 
                    egrad='$egrad', 
                    juniorhigh='$juniorhigh', 
                    hgrad='$hgrad', 
                    seniorhigh='$seniorhigh', 
                    shgrad='$shgrad' 
                    WHERE username='$username'";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: ../apointment.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
