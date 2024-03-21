<?php

$hostName = "localhost";
$dbUser = "";
$dbPassword = "";
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went  wrong please check connectivity again;");
}
// try {
//     //code...
// $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

// } catch (\Throwable $th) {
//     echo "Failed " . $th->getMessage();
//     throw $th;
// }

// if($conn) { 
//     echo "success";  
// }  
// else { 
//     echo "failed";  

//     die("Error". mysqli_connect_error());  
// }  

// try {
//     $conn = new PDO("mysql:host=$hostName;dbname=$dbName", $dbUser, $dbPassword);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "coonected";
// } catch (PDOException $e) {
//     echo "Failed " . $e->getMessage();
// }


// $servername = "localhost";
// $username = "root";
// $password = "";
// $db = "registration_login_db";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo "Failed " . $e->getMessage();
// }

?>