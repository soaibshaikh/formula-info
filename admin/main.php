<?php
session_start();
// print_r($_SESSION);
// echo 'eer';
if (!isset($_SESSION["admin"])) {
   header("Location: login.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="header-section">
        <h1>Welcome to Admin panel</h1>
    </div>
    <div class="container">
        <table class="table table-hover table-responsive caption-top">
            <caption>List of Customers</caption>
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
        while($row = $result->fetch_assoc()) {
            // echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td></tr>";
            echo '<tr>
            <th scope="row">' . $row["id"]. '</th>
            <td>' . $row["full_name"]. '</td>
            <td>' . $row["email"]. '</td>
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

                <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
            </tbody>
        </table>
    </div>

</body>

</html>