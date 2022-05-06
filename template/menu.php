
<?php
if (!logged_in()){
?>
    <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <!-- <h1><a href="index.html">Pitstop</a></h1> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="index.php"><img src="/assets/img/logo.png" alt="Pitstop" class="img-fluid"></a>
            </div>

            <style>
                .navbar .btn-featured {
    margin-top: 10px;
    margin-right: -20px;
    background-color: #373435;
}
            </style>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="https://pitstoplimited.com">Home</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#cart">Shop</a></li> -->
                    <li><a class="nav-link scrollto" href="./index.php#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="./index.php#services">Services</a></li>
                    <!-- <li><a class="nav-link scrollto" href="./index.php#pricing">Pricing</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#shop">Shop</a></li> -->

                    <!-- <li class="dropdown"><a href="#"><span>Shop</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> -->                   
                      <li><a class="nav-link scrollto" href="./index.php#contact">Contact</a></li>
                </ul>
                <a href="./shop.php" class="btn btn-featured pull-right" style="color:#ffffff">SHOP</a>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <?php
} else {
    ?>
    <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <!-- <h1><a href="index.html">Pitstop</a></h1>
                Uncomment below if you prefer to use an image logo -->
                <a href="index.php"><img src="/assets/img/logo.png" alt="Pitstop" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link active" href="./index.php">Home</a></li>
                    <li><a class="nav-link" href="./create_album.php">Create Album</a></li>
                    <li><a class="nav-link" href="./albums.php">Albums</a></li>
                    <li><a class="nav-link " href="./upload_image.php">Upload image</a></li>
                    <li><a class="nav-link " href="./logout.php">Log out</a></li>
                    <li ><?php 
                    if (logged_in()) {
                        $user_data = user_data('name');
                         echo 'Hello ', $user_data['name'];
                     }
                    ?></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

<?php

}
?>