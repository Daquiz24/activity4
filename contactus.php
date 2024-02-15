<?php

require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Bootstrap CSS --><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Bootstrap CSS End -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha and Contact Form Example</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        #contactForm {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 16px;
            text-align: left;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        #captchaSection {
            margin-top: 20px;
            text-align: left;
        }
        #captchaLabel {
            font-size: 18px;
            margin-bottom: 8px;
            color: #555;
        }
        #captcha {
            font-size: 24px;
            background-color: #eee;
            padding: 8px;
            border-radius: 4px;
            display: inline-block;
        }
        #captchaInput {
            width: 60%;
            margin-top: 8px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        #copyMessage {
            color: red;
            font-size: 14px;
            margin-top: 10px;
         } .card {
      border-radius: 10px;
      box-shadow: 10px 8px 10px rgba(0, 0, 0, 0.1);
      padding: 15px;
      margin-bottom: 15px;
    }
    .card-container {
      margin-top: 5%;
    }

    .card {
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .card img {
      width: 100%;
      height: auto;
    }

    .card-body {
      padding: 20px;
    }
    .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            max-height: 100px; /* Adjust the height as needed */
            margin-right: 50px; /* Add margin to separate the logo from the navbar links */
        }

        /* Align the logo in the footer */
        .footer .logo {
            margin-right: 0; /* Remove margin to align the logo to the left in the footer */
        }
    </style>
</head>
<body>
<header>
        <!-- Logo -->
        <div class="logo-container">
    <?php
    $conn = connectToDatabase();
    $logoQuery = "SELECT pic FROM logo LIMIT 1"; // Assuming you have only one logo
    $logoResult = $conn->query($logoQuery);

    if ($logoResult->num_rows > 0) {
        $logoRow = $logoResult->fetch_assoc();
        $logoPath = $logoRow['pic'];

        // Display the logo with responsive image class
        echo '<img src="assets/img/' . $logoPath . '" alt="Logo" class="img-fluid" style="max-width: 6%;">';

    } else {
        // Display a default logo or handle accordingly
        echo '<img src="default-logo.png" alt="Default Logo" class="img-fluid" style="max-width: 100%;">';
    }

    $conn->close();
    ?>
</div>
         <!-- Navbar -->
         <nav>
            <div>
                <a href="index.php">Home</a>
                <a href="contactus.php">Contact US</a>
                <a href="enrollment.php" >Enroll Now</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            </div>
        </nav>
    </header>

    
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="config/login.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="contactForm">

    <h2>Contact Us</h2>
    <form id="contactUsForm">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Your Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <div id="captchaSection">
            <label id="captchaLabel" for="captchaInput">Enter the code below:</label>
            <span id="captchaCode" oncopy="onCaptchaCopy()">1234567890</span>
            <input type="text" id="captchaInput" name="captchaInput" onpaste="return false" placeholder="Enter the code" required>
        </div>

        <!-- Add a hidden field for the server-side captcha code -->
        <input type="hidden" id="serverCaptcha" name="serverCaptcha">

        <button type="button" onclick="submitForm()">Submit</button>
    </form>
</div>

<script>
    // Generate a random captcha code
    function generateCaptcha() {
        const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        let captcha = "";
        for (let i = 0; i < 10; i++) {
            captcha += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return captcha;
    }

    // Display the captcha code
    function displayCaptcha() {
        const captchaCode = generateCaptcha();
        document.getElementById("captchaCode").innerText = captchaCode;
        document.getElementById("serverCaptcha").value = captchaCode;
    }

    // Function to handle copying of captcha code
    function onCaptchaCopy() {
        document.getElementById("captchaCode").innerText = "Copying is disabled.";
        document.getElementById("copyMessage").innerText = "Copying is disabled. Please enter the code manually.";
    }

    // Function to submit the form using AJAX
    function submitForm() {
        // Get user-entered captcha
        const userEnteredCaptcha = document.getElementById("captchaInput").value;
        // Get the server-side captcha
        const serverCaptcha = document.getElementById("serverCaptcha").value;

        // Check if the entered captcha is correct
        if (userEnteredCaptcha !== serverCaptcha) {
            alert("Incorrect captcha. Please try again.");
            return; // Stop further processing
        }

        // Prepare form data for AJAX
        const formData = new FormData(document.getElementById("contactUsForm"));

        // Send form data to captcha.php using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "config/captcha.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Display the response from captcha.php
                alert(xhr.responseText);
                // Clear the form fields
                document.getElementById("name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("message").value = "";
                // Generate a new captcha after form submission
                displayCaptcha();
            }
        };
        xhr.send(formData);
    }

    // Initial display
    displayCaptcha();
</script>
<footer class="footer">
        <div class="container">
            <?php
            $conn = connectToDatabase();
            $sql = "SELECT school_name, address, contact_number FROM school_profile";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<p>School Name: ' . $row['school_name'] . '</p>';
                echo '<p>Address: ' . $row['address'] . '</p>';
                echo '<p>Contact Number: ' . $row['contact_number'] . '</p>';
            } else {
                echo 'No school profile data available.';
            }

            $conn->close();
            ?>
        </div>
         <div class="logo-container">
    <?php
    $conn = connectToDatabase();
    $logoQuery = "SELECT pic FROM logo LIMIT 1"; // Assuming you have only one logo
    $logoResult = $conn->query($logoQuery);

    if ($logoResult->num_rows > 0) {
        $logoRow = $logoResult->fetch_assoc();
        $logoPath = $logoRow['pic'];

        // Display the logo with responsive image class
        echo '<img src="assets/img/' . $logoPath . '" alt="Logo" class="img-fluid" style="max-width: 6%;">';

    } else {
        // Display a default logo or handle accordingly
        echo '<img src="default-logo.png" alt="Default Logo" class="img-fluid" style="max-width: 100%;">';
    }

    $conn->close();
    ?>
</div>
    </footer>

</body>
</html>
