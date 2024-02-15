<?php
require 'db.php'; // Include the database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if there are available slots
    $availableSlotsQuery = "SELECT COUNT(*) as count FROM appointment WHERE start_time > NOW() AND slots > 0";
    $availableSlotsResult = $conn->query($availableSlotsQuery);

    if ($availableSlotsResult !== false) {
        $availableSlotsRow = $availableSlotsResult->fetch_assoc();
        $availableSlotsCount = $availableSlotsRow['count'];

        if ($availableSlotsCount > 0) {
            // Continue with checking username availability
            $username = $_POST['username'];
            $sformat = $_POST['sformat'];
            $concatenated_username_sformat = $username . $sformat; // Concatenate username and sformat

            // Check if the username is available
            $usernameAvailabilityQuery = "SELECT COUNT(*) as count FROM student_data WHERE username = '$concatenated_username_sformat'";
            $usernameAvailabilityResult = $conn->query($usernameAvailabilityQuery);

            if ($usernameAvailabilityResult !== false) {
                $usernameAvailabilityRow = $usernameAvailabilityResult->fetch_assoc();
                $usernameAvailabilityCount = $usernameAvailabilityRow['count'];

                if ($usernameAvailabilityCount == 0) {
                    // Username is available, proceed with inserting into the database

                    // Collect form data
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
                    $email = $_POST['email'];

                    // Education information
                    $elementary = $_POST['elementary'];
                    $egrad = $_POST['egrad'];
                    $juniorhigh = $_POST['juniorhigh'];
                    $hgrad = $_POST['hgrad'];
                    $seniorhigh = $_POST['seniorhigh'];
                    $shgrad = $_POST['shgrad'];

                    // Enrollment Form information
                    $lastName = $_POST['lastName'];
                    $firstName = $_POST['firstName'];
                    $middleName = $_POST['middleName'];
                    $gender = $_POST['gender'];
                    $courseyear = $_POST['courseyear'];
                    $course = $_POST['course'];
                    $section = $_POST['section'];
                    $birthday = $_POST['birthday'];
                    $address = $_POST['address'];
                    $phonenumber = $_POST['phonenumber'];
                    $guardianname = $_POST['guardianname'];
                    $guardianPhoneNumber = $_POST['guardianPhoneNumber'];
                    $guardhomeaddress = $_POST['guardhomeaddress'];
                    $status = 'Pending';

                    // Appointment date and time
                    $appointmentDate = date('Y-m-d');
                    $appointmentTime = date('H:i:s');

                    // Update available slots in the appointment table
                    $updateSlotsQuery = "UPDATE appointment SET slots = slots - 1 WHERE start_time > NOW() AND slots > 0";
                    $updateSlotsResult = $conn->query($updateSlotsQuery);

                    if ($updateSlotsResult !== false) {
                        // Insert data into the database
                        $query = "INSERT INTO student_data (username, password, email, elementary, egrad, juniorhigh, hgrad, seniorhigh, shgrad, lastName, firstName, middleName, gender, courseyear, course, section, birthday, address, phonenumber, guardianname, guardianPhoneNumber, guardhomeaddress, status, appointment_date, appointment_time) VALUES ('$concatenated_username_sformat', '$password', '$email', '$elementary', '$egrad', '$juniorhigh', '$hgrad', '$seniorhigh', '$shgrad', '$lastName', '$firstName', '$middleName', '$gender', '$courseyear', '$course', '$section', '$birthday', '$address', '$phonenumber', '$guardianname', '$guardianPhoneNumber', '$guardhomeaddress', '$status', '$appointmentDate', '$appointmentTime')";

                        if ($conn->query($query) === TRUE) {
                            header("Location: ../index.php");
                            exit(); // Ensure that the script stops execution after redirection
                        } else {
                            echo "Error inserting data into the database: " . $conn->error;
                        }
                    } else {
                        echo "Error updating available slots: " . $conn->error;
                    }
                } else {
                    echo "Username is already taken. Please choose a different username.";
                }
            } else {
                echo "Error checking username availability: " . $conn->error;
            }
        } else {
            echo "No available slots. Cannot proceed with the appointment.";
        }
    } else {
        echo "Error checking available slots: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
