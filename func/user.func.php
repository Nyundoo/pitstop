<?php
function logged_in() {
    return isset($_SESSION['id']);
}

function login_check($email, $passwordx) {
//   $servername = "localhost";
// $username = "kketrades";
// $password = "Sifed32365042?";
// $dbname = "pitstop_upload";

$servername = "208.91.198.23";
   $username = "pitst5ii_pitstop_upload_user";
   $password = "32365042";
   $dbname = "pitst5ii_pitstop_upload";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

         // Check user is exist in the database
 $query    = "SELECT * FROM `db_users` WHERE `email`='$email'
 AND `password`='" . md5($passwordx) . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error());

if (mysqli_num_rows($result) == 1) {

  $row = mysqli_fetch_assoc($result);
  return $row['id'];

} else {
  
  return false;

}

mysqli_close($conn);
}

function user_data(){  

  // $servername = "localhost";
  // $username = "kketrades";
  // $password = "Sifed32365042?";
  // $dbname = "pitstop_upload";
  
$servername = "208.91.198.23";
   $username = "pitst5ii_pitstop_upload_user";
   $password = "32365042";
   $dbname = "pitst5ii_pitstop_upload";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $args = func_get_args();
  $fields = '`'.implode('`, `', $args).'`';
  
  $sql = "SELECT $fields FROM `db_users` WHERE `id`=".$_SESSION['id'];
  $query = mysqli_query($conn, $sql);

  $query_result = mysqli_fetch_assoc($query);
  foreach ($args as $field) {
    $args[$field] = $query_result[$field];
  }
 
  return $args;
  
  mysqli_close($conn);
}

function user_register($email, $name, $passwordx) {
    // $email = mysql_real_escape_string($email);
    // $name = mysql_real_escape_string($name);
    // mysql_query("INSERT INTO `db_users` VALUES ('', '$email', '$name', '".md5($password)."')");

    // return mysql_insert_id();


//     $servername = "localhost";
// $username = "kketrades";
// $password = "Sifed32365042?";
// $dbname = "pitstop_upload";

$servername = "208.91.198.23";
   $username = "pitst5ii_pitstop_upload_user";
   $password = "32365042";
   $dbname = "pitst5ii_pitstop_upload";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO db_users (email, name, password)
VALUES ('$email', '$name', '".md5($passwordx)."')";


if (mysqli_query($conn, $sql)) {
  // echo "Inserted Successful";
  return mysqli_insert_id($conn);
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}

function user_exists($email) {
    // $email = mysql_real_escape_string($email);
    // $query = mysql_query("SELECT COUNT(`user_id`) FROM `db_users` WHERE `email`='$email'");
    // return (mysql_result($query, 0) == 1) ? true : false;

// $servername = "localhost";
// $username = "kketrades";
// $password = "Sifed32365042?";
// $dbname = "pitstop_upload";

$servername = "208.91.198.23";
   $username = "pitst5ii_pitstop_upload_user";
   $password = "32365042";
   $dbname = "pitst5ii_pitstop_upload";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT COUNT(`id`) FROM `db_users` WHERE `email`='$email'";
    
$result = mysqli_query($conn, $sql);
        // return (mysqli_fetch_field($result, 0) == 1) ? true : false;
        $result = mysqli_query($conn, $sql);
        $row=mysqli_fetch_row($result);
        echo $row[0];   
    
        if ($row[0] > 0) {
            return true;
        }
        else {
            return false;
        }

mysqli_close($conn);
}
?>