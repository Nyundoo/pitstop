<?php
include 'init.php';

if (!logged_in()){
    header('Location: index.php');
    exit();
}

if (!isset($_GET['album_id']) || empty($_GET['album_id']) || album_check($_GET['album_id']) === false) {
    header('Location: albums.php');
    exit();
}

include 'template/header.php';
?>

<?php
$album_id = $_GET['album_id'];
$album_data = album_data($album_id, 'name', 'description');


if (isset($_POST['album_name'], $_POST['album_description'], $_POST['port_id'])) {
    $album_name = $_POST['album_name'];
    $album_description = $_POST['album_description'];
    $album_category = $_POST['port_id'];

    $errors = array();

    if (empty($album_name) || empty($album_description)) {
        $errors[] ='Album name and discription required. ';
    }else{
        if (strlen($album_name) > 55 || strlen($album_description) > 255){
            $errors = 'One or more fields contains too many characters';
        }
    }

    if (!empty($error)){
        foreach ($errors as $error) {
            echo $error, '<br />';
        }
    }else{
          edit_album($album_id, $album_name, $album_description, $album_category);
            header('Location: albums.php');
            exit();
    }
}
$ports = get_ports();
?>
<style>
.center {
  margin: auto;
  width: 50%;
  padding: 10px;
}
</style>

<div class="center">
<h3 style="margin-top:60px;">Edit Album</h3>

<?php
$ports = get_ports();


if (isset($_FILES['image'], $_POST['album_name'], $_POST['album_description'], $_POST['port_id'])){
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];

    $album_name = $_POST['album_name'];
    $album_description = $_POST['album_description'];  
    $album_category = $_POST['port_id']; 

    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
    $image_ext = strtolower(end(explode('.', $image_name)));
    

    $errors = array();
    
    if (empty($image_name) || empty($album_name) || empty($album_description)){
        $errors[] = 'Something is missing';
    } else {

        if (strlen($album_name) > 55 || strlen($album_description) > 255){
            $errors[] = 'One or more fields contains too many characters.';
        }

        if (in_array($image_ext, $allowed_ext) === false){
            $errors[] = 'File type not allowed';
        }

        if ($image_size > 2097152) {
            $errors[] = 'Maximum file size is 2mb';
        }

        if (!empty($errors)) {
            foreach($errors as $error) {
                echo $error, '<br/>';
            }
        }else{
            create_album($album_name, $album_description, $album_category, $image_temp, $image_ext);
            header('Location: albums.php');
            exit();
        }

    }
}



// if (isset($_POST['album_name'], $_POST['album_description'], $_POST['port_id'])){
//     $album_name = $_POST['album_name'];
//     $album_description = $_POST['album_description'];  
//     $album_category = $_POST['port_id']; 

//     $errors = array();

//     if(empty($album_name) || empty($album_description)) {
//         $erros[] = 'Album name and description required!';
//     }else{
//         if (strlen($album_name) > 55 || strlen($album_description) > 255){
//             $errors[] = 'One or more fields contains too many characters.';
//         }
//     }

//     if (!empty($errors)) {
//         foreach($errors as $error) {
//             echo $error, '<br/>';
//         }
//     }else{
//         create_album($album_name, $album_description, $album_category);
//         header('Location: albums.php');
//         exit();
//     }
// }

?>
<style>
.myForm {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.8em;
width: 40em;
padding: 1em;
}

.myForm * {
box-sizing: border-box;
}

.myForm label {
padding: 0;
font-weight: bold;
text-align: right;
display: block;
}

.myForm input,
.myForm select,
.myForm textarea {
margin-left: 2em;
float: right;
width: 20em;
border: 1px solid #ccc;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.9em;
padding: 0.3em;
}

.myForm textarea {
height: 100px;
}

.myForm button {
padding: 1em;
border-radius: 0.5em;
background: #eee;
border: none;
font-weight: bold;
margin-left: 14em;
margin-top: 1.8em;
}

.myForm button:hover {
background: #ccc;
cursor: pointer;
}
</style>
    
<form class="myForm" method="post" enctype="multipart/form-data" action="?album_id=<?php echo $album_id; ?>">
<p><label>Choose a file
<input type="file" name="image" />
</label>
</p>
<p>
<label>Name 
<input type="text" name="album_name"  maxlength="55" value="<?php echo $album_data['name']; ?>" />
</label> 
</p>
	
<p>
<label>Category 
<select id="pickup_place" name="port_id">
    <option value="" selected="selected">Select One</option>
            <?php
            foreach($ports as $port) {
                echo '<option value="', $port['id'] ,'">', $port['name'] ,'</option>';
            }
            ?>
</select>

</label> 
</p>

<p>
<label>Description 
<textarea name="album_description" rows="6" cols="35" maxlenght="255"><?php echo $album_data['description']; ?></textarea>
</label>
</p>

<p><button>Edit</button></p>

</form>
</div>

<?php
include 'template/footer.php';
?>