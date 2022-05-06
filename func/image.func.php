<?php
    function upload_image($image_temp, $image_ext, $album_id) {
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

        $album_id = (int)$album_id;

        $sql = "INSERT INTO db_images (user_id, album_id, timestamp, ext)
VALUES ('".$_SESSION['id']."', '$album_id', UNIX_TIMESTAMP(), '$image_ext')";
       $result = mysqli_query($conn, $sql);

         $image_id = mysqli_insert_id($conn);

         $image_file = $image_id.'.'.$image_ext;

         move_uploaded_file($image_temp, 'uploads/'.$album_id.'/'.$image_file);

         //Create thumbnail upload function

         mysqli_close($conn);

    }

    function get_images($album_id) {
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

      $album_id = (int)$album_id;

      $images = array();

      $sql = "SELECT `image_id`, `album_id`, `timestamp`, `ext` FROM `db_images` WHERE `album_id`=$album_id AND `user_id`=".$_SESSION['id'];
      $result = mysqli_query($conn, $sql);

      while ($images_row = mysqli_fetch_assoc($result)) {
       $images[] = array(
              'id' => $images_row['image_id'],
              'album' => $images_row['album_id'],
              'timestamp' => $images_row['timestamp'],
              'ext' => $images_row['ext']
       );
      }
      
      return $images;

      mysqli_close($conn);
    }

    function get_imagesx($album_id) {
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

      $album_id = (int)$album_id;

      $images = array();

      $sql = "SELECT `image_id`, `album_id`, `timestamp`, `ext` FROM `db_images` WHERE `album_id`=$album_id";
      $result = mysqli_query($conn, $sql);

      while ($images_row = mysqli_fetch_assoc($result)) {
       $images[] = array(
              'id' => $images_row['image_id'],
              'album' => $images_row['album_id'],
              'timestamp' => $images_row['timestamp'],
              'ext' => $images_row['ext']
       );
      }
      
      return $images;

      mysqli_close($conn);
    }

    function image_check($image_id) {
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

      $album_id = (int)$album_id;

      $query    = "SELECT * FROM `db_images` WHERE `image_id`='$image_id' AND `user_id`=".$_SESSION['id'] ;
      $result = mysqli_query($conn, $query) or die(mysqli_error());
      
      if (mysqli_num_rows($result) == 1) {
      
        return true;
      
      } else {
        
        return false;
      
      }
      
      mysqli_close($conn);

    }

    function delete_image($image_id) {
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

      $album_id = (int)$album_id;        

      //To do: Use a method to delete all files from album and thumbs folder, then the directory.
      
      $sql = "SELECT `album_id`, `ext` FROM `db_images` WHERE `image_id`=$image_id AND `user_id`=".$_SESSION['id'];
      $result = mysqli_query($conn, $sql);
      $image_row = mysqli_fetch_assoc($result);

      $album_id = $image_row['album_id'];
      $image_ext = $image_row['ext'];

      unlink('uploads/'.$album_id.'/'.$image_id.'.'.$image_ext);
      //delete thumbnails

      $sql2 = "DELETE FROM `db_images` WHERE `image_id`=$image_id AND `user_id`=".$_SESSION['id'];
      $result2 = mysqli_query($conn, $sql2);

      mysqli_close($conn);
    }
?>