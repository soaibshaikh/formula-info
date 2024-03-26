<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
}
?>



<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard | Formula1</title>
  <link rel="stylesheet" href="index.css" />
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php include 'navbar.php'; ?>


  <main class="main">
    <div class="admin-dashboard">
      <div class="header-section">
        <h1>Welcome to Admin panel</h1>
      </div>
      <div class="container">
        <table class="table table-hover table-responsive caption-top">
          <caption>List of Products</caption>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Full Name</th>
              <th scope="col">Email</th>
              <!-- <th scope="col">Handle</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            // require_once 'connect/database.php'; // Include the database connection file
            // require_once('connect/database.php'); // Adjust the path according to your directory structure

            require_once "database.php";
            //         $sql = "SELECT * FROM users WHERE email = '$email'";
            // $result = mysqli_query($conn, $sql);
            //         $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // Fetch data from MySQL
            $sql = "SELECT * FROM users"; // Change 'your_table' to your actual table name
            // $result = $conn->query($sql);
            $result = mysqli_query($conn, $sql);

            // Display data in HTML table
            if ($result->num_rows > 0) {
              // echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                // echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td></tr>";
                echo '<tr>
            <th scope="row">' . $row["id"] . '</th>
            <td>' . $row["full_name"] . '</td>
            <td>' . $row["email"] . '</td>
          </tr>';
                //   <td>' . $row["password"]. '</td>
              }
              // echo "</table>";
            } else {
              echo "0 results";
            }

            // Close connection (optional as PHP automatically closes connections at the end of script execution)
            $conn->close();
            ?>


          </tbody>
        </table>

        <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
      </div>
    </div>
  </main>


  <script src="script.js"></script>
</body>

</html>