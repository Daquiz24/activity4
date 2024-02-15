
<?php
// Include the template content

require_once 'config/db.php';




?>
<!DOCTYPE html>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Bootstrap CSS --><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <style>
   body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

    .container {
      max-width: 1000px;
      margin: auto;
      background-color: #fff;
      padding: 50px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    h1 {
      color: #82a43a;
    }

    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #ffff;
      color: #82a43a;
    }

    input[type="date"],
    input[type="time"],
    input[type="number"],
    input[type="text"],
    input[type="password"],
    select,
    textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      margin-bottom: 10px;
      border: 1px solid #ced4da;
      border-radius: 4px;
    }

    button {
      background-color: #28a745;
      color: #fff;
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button.btn-danger {
      background-color: #dc3545;
    }
/* Default styles */
.modal-dialog {
  margin: 0;
  margin-right: auto;
  margin-left: auto;
}

.modal-content {
  border: none;
  box-shadow: none;
  border-radius: 0;
  max-width: 100%;
  height: 100vh;
  overflow-y: auto;
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #ddd;
  padding-bottom: 10px;
}

.modal-title {
  font-size: 24px;
}

.btn-close {
  background: none;
  border: none;
  font-size: 20px;
  cursor: pointer;
  color: #888;
}

.modal-body {
  margin-top: 20px;
}

.modal-footer {
  border-top: 1px solid #ddd;
  padding-top: 10px;
  display: flex;
  justify-content: flex-end;
}

/* Responsive styles */
@media (max-width: 1000px) {
  .modal-dialog {
    margin: 0;
    width: 100%;
  }

  .modal-content {
    border-radius: 0;
    height: 100%;
    max-height: none;
  }
}



    .btn {
      padding: 10px 20px;
      margin: 0 5px;
      border: none;
      cursor: pointer;
    }

    aside {
            width: 200px;
            max-width: 100%;
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%; /* Ensures the sidebar takes full height */
            overflow-y: auto; /* Enables scrolling for the sidebar if its content is too long */
        }

        aside h2 {
            margin-bottom: 10px;
        }

        aside ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        aside li {
            margin-bottom: 10px;
        }

        aside a {
            color: #fff;
            text-decoration: none;
        }

        aside a:hover {
            text-decoration: underline;
        }

        main {
            flex: 1;
            padding: 20px;
            margin-left: 200px; /* Adjust this margin to match the width of the sidebar */
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            aside {
                width: 100%;
                max-width: 100%;
                box-sizing: border-box;
                padding: 10px;
                position: static; /* Reset position for small screens */
            }

            main {
                margin-left: 0; /* Reset margin for small screens */
            }
        
        }

  </style>
    <title>Appointment</title>
</head>

<body>
<aside>
    <br>
    <br>
    <br>
    <br>
    
        <!-- Sidebar content goes here -->
        <h2>Admin</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="apointment.php">Appointment</a></li>
            <li><a href="messenging.php">Messenging</a></li>
           
       
        </ul>
    </aside>
    <main>

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <!-- Sidebar Trigger Start -->
      <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"><span class="navbar-toggler-icon"></span></button>
      <!-- Sidebar Trigger End -->
      <a class="navbar-brand fw-bold me-auto" href="dashbroad.php">DASHBOARD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex ms-auto">
          <div class="input-group my-3 my-lg-0">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
          </div>
        </form>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-square"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="config/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>

  </nav>             
    <div class="container">
        <h1>Appointment</h1>

        <!-- Form for inputting new data -->
        <form action="config/appoint.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Slots</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><input type="date" name="date" required></td>
                        <td><input type="time" name="start_time" required></td>
                        <td><input type="time" name="end_time" required></td>
                        <td><input type="number" name="slots" required></td>
                        <td><button type="submit" class="btn btn-primary" name="add">Add</button></td>
                    </tr>
                    <!-- Add more rows as needed -->
            
              
        </form>
<br>
        <?php
        $result = $conn->query("SELECT * FROM appointment");

      
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['date'] . "</td>
                    <td>" . $row['start_time'] . "</td>
                    <td>" . $row['end_time'] . "</td>
                    <td>" . $row['slots'] . "</td>
                    <td>
                        <form action='config/appoint.php' method='post'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                  </tr>";
        }

        echo "</tbody></table>";

        // Close the database connection
     
        ?>
    

    </div>

    <div class="container">
    <h1>Student Approval Requests</h1>

    <!-- Form for inputting new data -->

    <table>
        <thead>
            <tr>
                <th>Appointment Date</th>
                <th>Time</th>
                <th>Username</th>
                <th>Name</th>
                <th>Course</th>
                <th>Year</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
           $result = $conn->query("SELECT * FROM student_data where status='Pending' ");

           if ($result !== false) {
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                       // Display user details dynamically here
                       echo "<tr>";
                       echo "<td>" . $row["appointment_date"] . "</td>";
                       echo "<td>" . $row["appointment_time"] . "</td>";
                       echo "<td>" . $row["username"] . "</td>";
                       echo "<td>" . $row["firstName"] . " " . $row["middleName"] . " " . $row["lastName"] . "</td>";
                       echo "<td>" . $row["course"] . "</td>";
                       echo "<td>" . $row["courseyear"] . "</td>";
                       echo "<td>" . $row["status"] . "</td>";
                       echo "<td><button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#enrollmentModal" . $row["id"] . "'>OPEN</button></td>";
                       echo "</tr>";
           
                       // Display user details dynamically here
                       echo "<div class='modal fade' id='enrollmentModal" . $row['id'] . "' tabindex='-1' aria-labelledby='enrollmentModalLabel' aria-hidden='true'>";
                       echo "<div class='modal-dialog'>";
                       echo "<div class='modal-content'>";
                       echo "<div class='modal-header'>";
                       echo "<h5 class='modal-title' id='enrollmentModalLabel'>Student Details</h5>";
                       echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                       echo "</div>";
                       echo "<div class='modal-body'>";
                   
                       echo "<p>Student Name: " . $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'] . "</p>";
                       echo "<p>Appointment Schedule: " . $row['appointment_date'] . " " . $row['appointment_time'] . "</p>";
                        // Add other fields as needed
                        echo"<form action='config/approve.php' method='POST'>";
                        echo "<input type='hidden' name='student_id' value='" . $row['id'] . "'>";
                        echo "<label for=''><b>UserName:</b></label>  <input type='text' name='username' value='" . $row['username'] . "'><br>";
                        echo "<label for=''><b>Password:</b></label>  <input type='password' name='password' value='" . $row['password'] . "'><br>";
                        echo "<label for=''><b>Last Name:</b></label>  <input type='text' name='firstName' value='" . $row['lastName'] . "'><br>";
                        echo "<label for=''><b>First Name:</b></label>  <input type='text' name='lastName' value='" . $row['firstName'] . "'><br>";
                        echo "<label for=''><b>Middle Name:</b></label>  <input type='text' name='middleName' value='" . $row['middleName'] . "'><br>";
                        echo "<label for='gender'><b>Sex:</b></label> <select id='gender' name='gender' required><br>";
                        echo "<option value='choose gender'>Choose Gender:</option>";
                        echo "<option value='male' " . ($row['gender'] == 'male' ? 'selected' : '') . ">Male</option>";
                        echo "<option value='female' " . ($row['gender'] == 'female' ? 'selected' : '') . ">Female</option>";
                        echo "</select><br>";
                        // Year
echo "<label for='courseyear'><b>Year:</b></label>";
echo "<select id='courseyear' name='courseyear' required>";
echo "<option value='choose year'>Choose Year:</option>";
echo "<option value='1st' " . ($row['courseyear'] == '1st' ? 'selected' : '') . ">1st year</option>";
echo "<option value='2nd' " . ($row['courseyear'] == '2nd' ? 'selected' : '') . ">2nd year</option>";
echo "<option value='3rd' " . ($row['courseyear'] == '3rd' ? 'selected' : '') . ">3rd year</option>";
echo "<option value='4th' " . ($row['courseyear'] == '4th' ? 'selected' : '') . ">4th year</option>";
echo "</select><br>";

// Course
echo "<label for='course'><b>Select Course:</b></label>";
echo "<select id='course' name='course' required>";
echo "<option value='choose course'>Choose Course:</option>";
echo "<option value='BSIT' " . ($row['course'] == 'BSIT' ? 'selected' : '') . ">Bachelor of Science in Information Technology</option>";
echo "<option value='BSCS' " . ($row['course'] == 'BSCS' ? 'selected' : '') . ">Bachelor of Science in Computer Science</option>";
echo "<option value='BSCE' " . ($row['course'] == 'BSCE' ? 'selected' : '') . ">Bachelor of Science in Civil Engineering</option>";
echo "</select><br>";

// Birthday
echo "<label for='birthday'><b>Birthday:</b></label>";
echo "<input type='date' id='birthday' name='birthday' value='" . $row['birthday'] . "' required><br>";

// Home Address
echo "<label for='address'><b>Home Address:</b></label>";
echo "<input type='text' name='address' placeholder='Home Address' value='" . $row['address'] . "' required><br>";

// Phone Number
echo "<label for='phonenumber'><b>Phone Number:</b></label><br>";
echo "<input type='number' name='phonenumber' placeholder='Phone Number' value='" . $row['phonenumber'] . "' required><br>";

// Email Address
echo "<label for='email'><b>Email Address:</b></label>";
echo "<input type='email' name='email' placeholder='Email' value='" . $row['email'] . "' required><br>";

// Guardian Name
echo "<label for='guardianname'><b>Guardian Name:</b></label>";
echo "<input type='text' name='guardianname' placeholder='Guardian Name' value='" . $row['guardianname'] . "' required><br>";

// Guardian Phone Number
echo "<label for='guardianPhoneNumber'><b>Guardian Phone Number:</b></label>";
echo "<input type='number' name='guardianPhoneNumber' placeholder='Guardian Phone Number' value='" . $row['guardianPhoneNumber'] . "' required><br>";

// Guardian Home Address
echo "<label for='guardhomeaddress'><b>Guardian Home Address:</b></label>";
echo "<input type='text' name='guardhomeaddress' placeholder='Guardian Home Address' value='" . $row['guardhomeaddress'] . "' required><br>";

// Elementary School
echo "<label for='elementary'><b>Elementary</b></label>";
echo "<input type='text' name='elementary' placeholder='School Name' value='" . $row['elementary'] . "' required>";
echo "<input type='text' name='egrad' placeholder='Graduation Year' value='" . $row['egrad'] . "'><br>";

// Junior High School
echo "<label for='juniorhigh'><b>Junior High School</b></label>";
echo "<input type='text' name='juniorhigh' placeholder='School Name' value='" . $row['juniorhigh'] . "' required>";
echo "<input type='text' name='hgrad' placeholder ='Graduation Year' value='" . $row['hgrad'] . "'><br>";

// Senior High School
echo "<label for='seniorhigh'><b>Senior High School</b></label>";
echo "<input type='text' name='seniorhigh' placeholder='School Name' value='" . $row['seniorhigh'] . "' required>";
echo "<input type='text' name='shgrad' placeholder='Graduation Year' value='" . $row['shgrad'] . "'><br>";

                        echo "</div>";
                        echo "<div class='modal-footer'>";
                        echo "<button type='submit' class='btn btn-primary'  name='enroll'>Enroll</button>";
                        
                        echo" </form>";
                     echo"<form action ='config/reject.php' method='POST'>";
                        echo "<input type='hidden' name='student_id' value='" . $row['id'] . "'>";
                        echo "<button type='submit' class='btn btn-danger' name='reject' value='.$row[id]'>Reject</button>";
                       echo"</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }
            } else {
                echo "Error: " . $conn->error;
            }
            ?>
        </tbody>
    </table>
</div>

<br>
<div class="container">
    <h1>Master List</h1>

    <!-- Form for inputting new data -->

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Course</th>
                <th>Year</th>
                <th>Section</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
$result = $conn->query("SELECT * FROM student_data where status='enrolled' ");

if ($result !== false) {
    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Username</th>";
        echo "<th>Name</th>";
        echo "<th>Course</th>";
        echo "<th>Year</th>";
        echo "<th>Section</th>";
        echo "<th>Status</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            // Display user details dynamically here
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["firstName"] . " " . $row["middleName"] . " " . $row["lastName"] . "</td>";
            echo "<td>" . $row["course"] . "</td>";
            echo "<td>" . $row["courseyear"] . "</td>";
            echo "<td>" . $row["section"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td><button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#masterlistModal" . $row["id"] . "'>OPEN</button></td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";

        // Modal structure outside the loop
        $result->data_seek(0); // Reset result set pointer to the beginning
        while ($row = $result->fetch_assoc()) {
            echo "<div class='modal fade' id='masterlistModal" . $row["id"] . "' tabindex='-1' aria-labelledby='masterlistModalLabel' aria-hidden='true'>";
            echo "<div class='modal-dialog'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='exampleModalLabel'>" . $row["firstName"] . " " . $row["middleName"] . " " . $row["lastName"] . "</h5>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo"<b><h5>Student Profile</h5><b>";
            // Table inside modal
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Title</th>";
            echo "<th>Value</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo"<form action='config/masterlist.php' method='POST'>";
            echo "<tr>";
            echo "<td>Username</td>";
            echo "<td><input type='text' name='username' value='" . $row['username'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>First Name</td>";
            echo "<td><input type='text' name='firstName' value='" . $row['firstName'] . "'/></td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td>Middle Name</td>";
            echo "<td><input type='text' name='middleName' value='" . $row['middleName'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Last Name </td>";
            echo "<td><input type='text' name='lastName' value='" . $row['lastName'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Sex</td>";
            echo "<td>";
            echo "<select name='gender'>";
            echo "<option value='choose gender'>Choose Gender:</option>";
            echo "<option value='male' " . ($row['gender'] == 'male' ? 'selected' : '') . ">Male</option>";
            echo "<option value='female' " . ($row['gender'] == 'female' ? 'selected' : '') . ">Female</option>";
            echo "</select>";
            echo "</td>";
            echo "</tr>";
            
              
            echo "<tr>";
            echo "<td>Course</td>";
            echo "<td>";
            echo "<select id='course' name='course' required>";
            echo "<option value='choose course'>Choose Course:</option>";
            echo "<option value='BSIT' " . ($row['course'] == 'BSIT' ? 'selected' : '') . ">Bachelor of Science in Information Technology</option>";
            echo "<option value='BSCS' " . ($row['course'] == 'BSCS' ? 'selected' : '') . ">Bachelor of Science in Computer Science</option>";
            echo "<option value='BSCE' " . ($row['course'] == 'BSCE' ? 'selected' : '') . ">Bachelor of Science in Civil Engineering</option>";
            echo "</select>";
            echo "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Year</td>";
            echo "<td>";
            echo "<select id='courseyear' name='courseyear' required>";
            echo "<option value='choose year'>Choose Year:</option>";
            echo "<option value='1st' " . ($row['courseyear'] == '1st' ? 'selected' : '') . ">1st year</option>";
            echo "<option value='2nd' " . ($row['courseyear'] == '2nd' ? 'selected' : '') . ">2nd year</option>";
            echo "<option value='3rd' " . ($row['courseyear'] == '3rd' ? 'selected' : '') . ">3rd year</option>";
            echo "<option value='4th' " . ($row['courseyear'] == '4th' ? 'selected' : '') . ">4th year</option>";
            echo "</select>";
            echo "</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td>Birthday</td>";
            echo "<td><input type='text' name='birthday' value='" . $row['birthday'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Home Address</td>";
            echo "<td><input type='text' name='address' value='" . $row['address'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Phone Number</td>";
            echo "<td><input type='text' name='phonenumber' value='" . $row['phonenumber'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Home Address</td>";
            echo "<td><input type='email' name='email' value='" . $row['email'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Guardian Name</td>";
            echo "<td><input type='text' name='guardianname' value='" . $row['guardianname'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Guardian Phone No.</td>";
            echo "<td><input type='text' name='guardianPhoneNumber' value='" . $row['guardianPhoneNumber'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Guardian Address </td>";
            echo "<td><input type='text' name='guardianadress' value='" . $row['guardhomeaddress'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Elementary</td>";
            echo "<td><input type='text' name='elementary' value='" . $row['elementary'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Graduation Year</td>";
            echo "<td><input type='text' name='egrad' value='" . $row['egrad'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Junior High</td>";
            echo "<td><input type='text' name='juniorhigh' value='" . $row['hgrad'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Graduation Year</td>";
            echo "<td><input type='text' name='hgrad' value='" . $row['hgrad'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Elementary</td>";
            echo "<td><input type='text' name='seniorhigh' value='" . $row['seniorhigh'] . "'/></td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Graduation Year</td>";
            echo "<td><input type='text' name='shgrad' value='" . $row['shgrad'] . "'/></td>";
            echo "</tr>";


            echo "</tbody>";
            echo "</table>";

            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='submit' class='btn btn-primary'>Update</button><br>";
            echo"</form>";
            echo"<form action ='config/drop.php' method='POST'>";
            echo "<input type='hidden' name='student_id' value='" . $row['id'] . "'>";
            echo "<button type='submit' class='btn btn-danger' name='drop' value='.$row[id]'>Drop</button>";
            echo"</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<tr><td colspan='7'>No records found</td></tr>";
    }
} else {
    echo "Error: " . $conn->error;
}
?>


                        
                 
     
        

<!-- Modal -->

<br>

<div class="container">
    <h1>Subject</h1>

    <!-- Form for inputting new data -->
    
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Course</th>
                    <th>Instructor</th>
                    <th>Year</th>
                    <th>Hours</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // Assuming you have a database connection
                
                $sql = "SELECT * FROM subjects";
                $result = mysqli_query($conn, $sql);

                // Fetch data and display in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<form action='config/updatesub.php' method='post'>";
                    echo "<tr>";
                    echo "<td><input type='text' name='subject' value='" . $row['subject'] . "'></td>";
                    echo "<td><select id='course' name='course' required>
                          <option value='choose course'>Choose Course:</option>
                          <option value='BSIT'" . ($row['course'] == 'BSIT' ? ' selected' : '') . ">Bachelor of Science in Information Technology</option>
                          <option value='BSCS'" . ($row['course'] == 'BSCS' ? ' selected' : '') . ">Bachelor of Science in Computer Science</option>
                          <option value='BSCE'" . ($row['course'] == 'BSCE' ? ' selected' : '') . ">Bachelor of Science in Civil Engineering</option>
                        </select></td>";
                    echo "<td><input type='text' name='instructor' value='" . $row['instructor'] . "'></td>";
                    echo "<td><select id='courseyear' name='courseyear' required>
                          <option value='choose year'>Choose Year:</option>
                          <option value='1st'" . ($row['courseyear'] == '1st' ? ' selected' : '') . ">1st year</option>
                          <option value='2nd'" . ($row['courseyear'] == '2nd' ? ' selected' : '') . ">2nd year</option>
                          <option value='3rd'" . ($row['courseyear'] == '3rd' ? ' selected' : '') . ">3rd year</option>
                          <option value='4th'" . ($row['courseyear'] == '4th' ? ' selected' : '') . ">4th year</option>
                        </select></td>";
                    echo "<td><input type='number' name='hours' value='" . $row['hours'] . "'></td>";
                    echo "<td>
                            <input type='hidden' name='id' value='" . $row['id'] . "'> <!-- Assuming you have a unique identifier like 'id' for each row -->
                            <button type='submit' class='btn btn-primary' name='update'>Update</button>
                          </form>
                          <form action='config/deletesub.php' method='post'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'> <!-- Assuming you have a unique identifier like 'id' for each row -->
                            <button type='submit' class='btn btn-danger' name='delete'>Delete</button>
                          </form>
                        </td>";
                    echo "</tr>";
                }  
                ?>
                
                <!-- Input fields for new data -->
                <tr>
                <form action="config/subject.php" method="post">
                    <td><input type="text" name="subject"></td>
                    <td>
                        <select id="course" name="course" required>
                            <option value="choose course">Choose Course:</option>
                            <option value="BSIT">Bachelor of Science in Information Technology</option>
                            <option value="BSCS">Bachelor of Science in Computer Science</option>
                            <option value="BSCE">Bachelor of Science in Civil Engineering</option>
                        </select>
                    </td>
                    <td><input type="text" name="instructor"></td>
                    <td>
                        <select id="courseyear" name="courseyear" required>
                            <option value="choose year">Choose Year:</option>
                            <option value="1st">1st year</option>
                            <option value="2nd">2nd year</option>
                            <option value="3rd">3rd year</option>
                            <option value="4th">4th year</option>
                        </select>
                    </td>
                    <td><input type="number" name="hours"></td>
                    <td><button type="submit" class="btn btn-primary" name="addsub"> Add</button></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </form>
</div>

</body>

</html>