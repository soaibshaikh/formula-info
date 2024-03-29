<?php
// session_start();
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
</head>

<body>
  <nav class="sidebar">
    <a href="#" class="logo">Formula1</a>

    <div class="menu-content">
      <ul class="menu-items">
        <!-- <div class="menu-title">Your menu title</div> -->

        <li class="item">
          <a href="index.php">Home</a>
        </li>

        <li class="item">
          <div class="submenu-item">
            <span>Products submenu</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Your submenu title
            </div>
            <li class="item">
              <a href="products.php">Show Products</a>
            </li>
            <li class="item">
              <a href="add_product.php">Add Products</a>
            </li>
            <!-- <li class="item">
              <a href="#">First sublink</a>
            </li> -->
          </ul>
        </li>
        <!-- <li class="item">
          <div class="submenu-item">
            <span>Second submenu</span>
            <i class="fa-solid fa-chevron-right"></i>
          </div>

          <ul class="menu-items submenu">
            <div class="menu-title">
              <i class="fa-solid fa-chevron-left"></i>
              Your submenu title
            </div>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
            <li class="item">
              <a href="#">Second sublink</a>
            </li>
          </ul>
        </li> -->

        <li class="item">
          <a href="products.php">Products</a>
        </li>

        <li class="item">
          <a href="orders.php">Orders</a>
        </li>
        <li class="item">
          <a href="logout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <nav class="navbar">
    <i class="fa-solid fa-bars" id="sidebar-close"></i>
  </nav>

  <!-- <main class="main">
    <h1>Admin Dashboard Content</h1>
  </main> -->

  <script src="script.js"></script>
</body>

</html>