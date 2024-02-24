<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: connect/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>RaceInfoInd - Official Homepage of RII</title>
	<link rel="stylesheet" type="text/css" href="css/RaceInfoInd.css">
	<script src="js/RaceInfoInd.js"></script>
	<style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Titillium Web";
      font-size: 17px;
	  line-height: 23px;
	  letter-spacing: .2px;
	  background: #fff;
	  background-size: 100% auto
    }

    footer {
      background-color: #006039;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    footer a {
      color: #fff;
      text-decoration: none;
      margin: 0 10px;
    }
  </style>
</head>
<body>

<body background="">
	<header>	
			
			<div class="sec" style="display: flex;
			align-content: center; margin-left: 400px; margin-right: 400px;">
				<div class="sec1" id="sec1">
				
				</div>
				<div class="sec2" id="sec2"><
				
				</div>
				<div class="sec3" id="sec3">
				
				</div>
			</div>
		</div>
			<nav class="navbar">
				<ul>
					<li><img src="photos/LOGO.jpeg" class="pic1" id="pic1" height="20px" width="20px"></li>
					<li><a href="#">Home</a></li>
					<li><a href="pages/Schedules.html">Schedules</a></li>
					<li><a href="pages/Result & Standings.html">Result & Standings</a></li>
					<li><a href="pages/Teams & Drivers.html">Teams & Drivers</a></li>
					<li><a href="pages/About.html">About</a></li>
					<li><a href="#">Contact us</a></li>
					<li><a href="Racing store/index.html">Store</a></li>
					<li><a href="pages/Hot Topics.html">Hot Topics</a></li>
					<li><a href="connect/logout.php">Log Out</a></li>
				</ul>
			</nav>
	</header>

	<section>
		<div>
			<div class="c1" style="width: 800px;
    height: auto;
    border: 5px solid;
    border-radius: 10px;">
				<h4>Lewis Hamilton with multiple year contract to Ferrari</h4>
				<img src="photos/lh44toSF.jpg" width="800px" height="auto">
			</div>
		</div>
	</section>
	 <footer>
    <a href="#contacts">Contacts</a>
    <a href="#privacy-policy">Privacy Policy</a>
    <a href="#cookies-policy">Cookies Policy</a>
    <a href="#cookies-preference">Cookies Preference</a>
    <a href="#feedback">Feedback</a>
    <a href="#partners">Partners</a>
    <a href="#human-rights">Human Rights</a>
    <div class="footer-section">
        <small>&copy; 2024 RaceInfoInd. All Rights Reserved.</small>
      </div>
  </footer>

</body>
</html>

