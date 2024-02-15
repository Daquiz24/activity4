
<?php
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Bootstrap CSS --><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Log</title>
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
      max-width: 500px; /* Set your desired max-width */
      margin: 0;
      margin-right: auto;
      margin-left: auto;
    }

    .modal-content {
      border: none;
      box-shadow: none;
      border-radius: 0;
      max-width: 100%;
      height: 50vh;
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
    @media (max-width: 200px) {
      .modal-dialog {
        max-width: 100%;
      }
    }

    /* Add the following style to ensure the modal is centered vertically on smaller screens */
    @media (max-width: 768px) {
      .modal-dialog {
        margin-top: 50px;
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
      height: 100%;
      /* Ensures the sidebar takes full height */
      overflow-y: auto;
      /* Enables scrolling for the sidebar if its content is too long */
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
      margin-left: 200px;
      /* Adjust this margin to match the width of the sidebar */
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
        position: static;
        /* Reset position for small screens */
      }

      main {
        margin-left: 0;
        /* Reset margin for small screens */
      }
    }
  </style>
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
  <br>
  <br>
  <br> 
<h2>Inbox</h2>

<table>
    <thead>
        <tr>
            <th>Sender</th>
            <th>Email Address</th>
            <th>Date</th>
            <th>Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Sample Data -->
        <?php
$result = $conn->query("SELECT * FROM contact_form_submissions");

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row['name'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['message'] . "</td>
            <td>" . $row['submission_time'] . "</td>
            <td>
                <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#messageModal" . $row["id"] . "'>OPEN</button>
                <form action='config/deletemessage.php' method='post'>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                </form>
            </td>
          </tr>";

    // Message Modal
    echo "<div class='modal fade' id='messageModal" . $row["id"] . "' tabindex='-1' aria-labelledby='messageModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='messageModalLabel'>From: " . $row['name'] . "</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                      
                        <p>Message: " . $row['message'] . "</p>
                        
                    </div>
                </div>
            </div>
        </div>";
}

echo "</tbody></table>";

// Close the database connection
?>

      
    </tbody>
</table>

</body>
</html>
