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

$album_id = $_GET['album_id'];
$album_data = album_data($album_id, 'name', 'description');

echo '<h3>' ,$album_data['name'], '</h3><p>' ,$album_data['description'], '</p><p>' ,$album_category['category'], '</p>';

$album_id = $_GET['album_id'];

$images = get_images($album_id);

if (empty($images)) {
    echo 'There are no images in this album';
} else {
    foreach ($images as $image) {
        echo '<a href="uploads/' ,$album_id, '/' ,$image['id'], '.' ,$image['ext'], '"><img src="uploads/' ,$album_id, '/' ,$image['id'], '.' ,$image['ext'], '" alt="image" /></a> [<a href="delete_image.php?image_id=' ,$image['id'], '">X</a>]';
    } 
}

include 'template/footer.php';
?>