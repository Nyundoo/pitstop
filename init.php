<?php
ob_start();
session_start();

// $servername = "109.205.177.80";
// $username = "codeolso_test	";
// $password = "32365042";
// $dbname = "codeolso_spad697";
// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

include 'func/user.func.php';
include 'func/album.func.php';
include 'func/image.func.php';
include 'func/thumb.func.php';
include 'func/cat.func.php';
?>