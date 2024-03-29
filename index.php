<?php
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>Login</title>
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
                <a href="#">Home</a>
                <a href="contactus.php">Contact US</a>
                <a href="enrollment.php" >Enroll Now</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            </div>
        </nav>
    </header>


<!-- Image Slider -->
<div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
            // Include your database connection file
            

            // Fetch cover images from the database
            $conn = connectToDatabase();
            $coverImagesQuery = "SELECT picture_path FROM cover";
            $coverImagesResult = $conn->query($coverImagesQuery);

            if ($coverImagesResult->num_rows > 0) {
                $active = true; // To set the first image as active

                while ($coverImageRow = $coverImagesResult->fetch_assoc()) {
                    $imagePath = $coverImageRow['picture_path'];

                    // Check if the file exists
                    $imageFullPath = 'photos/' . $imagePath;

                    if (file_exists($imageFullPath)) {
                        // Display each cover image as a carousel item
                        echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
                        echo '<img src="' . $imageFullPath . '" alt="Cover Image" class="d-block w-100">';
                        echo '</div>';

                        $active = false; // Set to false after the first iteration
                    } else {
                        // Handle the case where the file doesn't exist
                        echo '<div class="alert alert-warning">Image not found: ' . $imageFullPath . '</div>';
                    }
                }
            } else {
                // Display a default image or handle accordingly
                echo '<div class="carousel-item active">';
                echo '<img src="default-cover-image.jpg" class="d-block w-100" alt="Default Cover Image">';
                echo '</div>';
            }

            $conn->close();
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php
$conn = connectToDatabase();
$sql = "SELECT image_path, title, caption FROM cards";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <!-- Container outside the loop -->
    <div class="container-fluid card-container">
        <div class="row">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <!-- Image with Description for each row -->
                <div class="col-md-4">
                    <div class="card">
                        <!-- Replace "your-image.jpg" with the actual image path from your database -->
                        <img src="photos/<?php echo $row['image_path']; ?>" alt="Image with Description" class="img-fluid rounded" style="max-width: 100%; height: 2in;">
                        <div class="card-body">
                            <b><h2 class="card-title"><?php echo $row['title']; ?></h2></b>
                            <p class="card-text"><?php echo $row['caption']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
} else {
    echo 'No data available.';
}
?>
<div class="container mt-4 d-flex flex-wrap">

<?php
  $conn = connectToDatabase();

  // Retrieve and display the data
  $sql = "SELECT * FROM grid_data";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // Display form for each card
    while ($row = $result->fetch_assoc()) {
      echo "<div class='col-md-4'>";
      echo "<div class='card d-flex flex-grow-1' style='background-color: " . $row['background_color'] . ";'>";
      
      // Dynamically set font size based on the 'size' property
      echo "<p class='fw-bold' style='font-size: " . $row['size'] . "mm;'>" . $row['title'] . "</p>";
      echo "<p style='font-size: " . $row['size'] . "mm;'>" . $row['caption'] . "</p>";
  
      echo "</div>";
      echo "</div>";
    }
  } else {
    // Handle case when no cards are found
    echo "No cards found.";
  }
?>

</div>


 

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

<!-- Enroll Modal -->
<div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollModalLabel">Enroll Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="config/enroll.php">
                    <div class="mb-3">
                        <p><b>I. Create your Student Portal Account</b></p>
                        <label for="username" class="form-label">Username:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="username" required>
                            <span class="input-group-text">@student</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="mb-3">
                        <p><b>II. Education</b></p>
                        <label for="elem" class="form-label">Elementary School:</label>
                        <input type="text" class="form-control" name="elem" required>
                    </div>

                    <!-- Add more fields as needed -->

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Enroll</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<!-- Other HTML content -->

    <!-- Footer -->
    <!-- Footer -->
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
<style>
  <style>
     body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .card {
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
        .hidden-content {
            display: none;
        }
  </style>