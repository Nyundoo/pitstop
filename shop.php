<?php include 'init.php';
include 'template/header.php';
include 'template/menu.php';
?>

<section id="cart" class="features">
        <div class="container">

<div class="section-title" data-aos="zoom-out">
    <h2>Online shop</h2>
    <p>Pitstop Online Shop</p>
</div>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color: #2196F3;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
</style>
          <?php cart(); ?>
          <br /><br />

          <?php
        $cats = cat_data();
?>
</div>
                  </section> <!--Cart-->

<?php
include 'template/footer.php';
?>