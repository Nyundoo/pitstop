<!DOCTYPE html>
<html lang="en">


<?php
include 'init.php';
include 'template/header.php';
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Portfolio Details</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Portfolio Details</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              
<?php

$album_id = $_GET['album_id'];
$album_data = album_datax($album_id, 'name', 'description');


$album_id = $_GET['album_id'];

$images = get_imagesx($album_id);

if (empty($images)) {
    echo 'There are no images in this album';
} else {
    foreach ($images as $image) {
        ?>
        <div class="swiper-slide">
            <?php
        echo '<a href="uploads/' ,$image['album'], '/' ,$image['id'], '.' ,$image['ext'], '"><img src="uploads/' ,$image['album'], '/' ,$image['id'], '.' ,$image['ext'], '" alt="" /></a>';
    
        ?>
        </div>
        <?php
    } 
}
?>
                

              <!-- <div class="swiper-slide">
                <img src="assets/img/portfolio/portfolio-details-2.jpg" alt="">
              </div>

              <div class="swiper-slide">
                <img src="assets/img/portfolio/portfolio-details-3.jpg" alt="">
              </div> -->

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: Web design</li>
              <!-- <li><strong>Client</strong>: ASU Company</li>
              <li><strong>Project date</strong>: 01 March, 2020</li>
              <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> -->
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>Portfolio detail</h2>
            <p>
                <?php
            echo '<h3>' ,$album_data['name'], '</h3><p>' ,$album_data['description'], '</p><p>' ,$album_category['category'], '</p>';
?>
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
<?php
include 'template/footer.php';
?>
</html>