<?php
include 'header.php'
?>

<!-- Main Slider Start -->
<div class="sticky-header-next-sec ec-main-slider section section-space-pb">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  


  
    <div class="carousel-item active">
      <img src="../assets/images/slider/Slider1.jpg" class="d-block w-100" height="500px" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item active">
      <img src="../assets/images/slider/Slider2.jpg" class="d-block w-100" height="500px" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item active">
      <img src="../assets/images/slider/Slider3.jpg" class="d-block w-100" height="500px" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
   
  
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
           
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- Product tab Area Start -->
    <section class="section ec-product-tab section-space-p" id="collection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Top Collection</h2>
                        <h2 class="ec-title">Our Top Collection</h2>
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>
                </div>

                <!-- Tab Start -->
                <div class="col-md-12 text-center">
                    <ul class="ec-pro-tab-nav nav justify-content-center">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab-pro-for-all">For
                                All</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-men">For
                                Men</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-women">For
                                Women</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-pro-for-child">For
                                Children</a></li>
                    </ul>
                </div>
                <!-- Tab End -->
                
            </div>
            <div class="row">
            <div class="col">
                <div class="tab-content">
                    <!-- 1st Product tab start -->
                    <div class="tab-pane fade show active" id="tab-pro-for-all">
                    <div class="row">
                    <?php
                            $mfetch = "SELECT * FROM `products` WHERE `For` = 'all';";
                            $mresult = mysqli_query($conn, $mfetch);
                            while ($prow = mysqli_fetch_array($mresult)) {



                                ?>
                                    <div class="col-lg-3 col-md-8 col-sm-8 col-xs-8 mb-6 pro-gl-content">
                                        <form action="wishlistdetail.php" method="post">
                                            <div class="ec-product-inner">
                                                <div class="ec-pro-image-outer">
                                                    <div class="ec-pro-image">
                                                        <a href="discription.php?did=<?php echo $prow['Product_id'] ?>" class="image">
                                                            <img class="main-image w-90" src="../assets/images/products/<?php echo $prow['Product_Image1'] ?>" height="300px" alt="Product" />
                                                            <img class="hover-image" src="../assets/images/products/<?php echo $prow['Product_Image2'] ?>" height="300px" alt="Product" />
                                                        </a>
                                                        <span class="percentage"><?php echo $prow['Sale'] ?></span>
                                                        <span class="flags">
                                                            <span class="new"><?php echo $prow['New_Arrival'] ?></span>
                                                        </span>

                                                        <div class="ec-pro-actions">

                                                            <button title="Add To Cart" class="add-to-cart"  type="submit" name="addtocart"><i class="fa-solid fa-cart-shopping" ></i> Add To Cart</button>
                                                            <button class="ec-btn-group wishlist" type="submit" name="add_to_cart" title="Wishlist"><i class="fa-solid fa-heart"></i></button>
                                                            <input type="hidden" name="title" value="<?php echo $prow['Product_Name'] ?>">
                                                            <input type="hidden" name="price" value="<?php echo $prow['New_Price'] ?>">
                                                            <input type="hidden" name="img" value="<?php echo $prow['Product_Image1'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ec-pro-content">
                                                    <h5 class="ec-pro-title"><a href="description.php?did=<?php echo $prow['Product_id'] ?>"><?php echo $prow['Product_Name'] ?></a></h5>
                                                    <div class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </div>

                                                    <span class="ec-price">
                                                        <span class="old-price"><?php echo $prow['Old_Price'] ?></span>
                                                        <span class="new-price">Rs:<?php echo $prow['New_Price'] ?></span>
                                                    </span>

                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                <?php } ?>





                            </div>
                    </div>
                    <!--  1st Product tab end -->
                    <!-- 2nd Product tab start -->
                    <div class="tab-pane fade" id="tab-pro-for-men">
                    <div class="row">
                    <?php
                            $mfetch = "SELECT * FROM `products` WHERE `For` = 'male';";
                            $mresult = mysqli_query($conn, $mfetch);
                            while ($mrow = mysqli_fetch_array($mresult)) {



                                ?>
                                    <div class="col-lg-3 col-md-8 col-sm-8 col-xs-8 mb-6 pro-gl-content">
                                        <form action="wishlistdetail.php" method="post">
                                            <div class="ec-product-inner">
                                                <div class="ec-pro-image-outer">
                                                    <div class="ec-pro-image">
                                                        <a href="discription.php?did=<?php echo $mrow['Product_id'] ?>" class="image">
                                                            <img class="main-image w-90" src="../assets/images/products/<?php echo $mrow['Product_Image1'] ?>" height="300px" alt="Product" />
                                                            <img class="hover-image" src="../assets/images/products/<?php echo $mrow['Product_Image2'] ?>" height="300px" alt="Product" />
                                                        </a>
                                                        <span class="percentage"><?php echo $mrow['Sale'] ?></span>
                                                        <span class="flags">
                                                            <span class="new"><?php echo $mrow['New_Arrival'] ?></span>
                                                        </span>

                                                        <div class="ec-pro-actions">

                                                            <button title="Add To Cart" class="add-to-cart"  type="submit" name="addtocart"><i class="fa-solid fa-cart-shopping" ></i> Add To Cart</button>
                                                            <button class="ec-btn-group wishlist" type="submit" name="add_to_cart" title="Wishlist"><i class="fa-solid fa-heart"></i></button>
                                                            <input type="hidden" name="title" value="<?php echo $mrow['Product_Name'] ?>">
                                                            <input type="hidden" name="price" value="<?php echo $mrow['New_Price'] ?>">
                                                            <input type="hidden" name="img" value="<?php echo $mrow['Product_Image1'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ec-pro-content">
                                                    <h5 class="ec-pro-title"><a href="description.php?did=<?php echo $mrow['Product_id'] ?>"><?php echo $mrow['Product_Name'] ?></a></h5>
                                                    <div class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </div>

                                                    <span class="ec-price">
                                                        <span class="old-price"><?php echo $mrow['Old_Price'] ?></span>
                                                        <span class="new-price">Rs:<?php echo $mrow['New_Price'] ?></span>
                                                    </span>

                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                <?php } ?>





                            </div>
                    </div>
                    <!-- ec 2nd Product tab end -->
                    <!-- ec 3rd Product tab start -->
                    <div class="tab-pane fade" id="tab-pro-for-women">
                    <div class="row">
                    <?php
                            $ffetch = "SELECT * FROM `products` WHERE `For` = 'female';";
                            $fresult = mysqli_query($conn, $ffetch);
                            while ($frow = mysqli_fetch_array($fresult)) {



                                ?>
                                    <div class="col-lg-3 col-md-8 col-sm-8 col-xs-8 mb-6 pro-gl-content">
                                        <form action="wishlistdetail.php" method="post">
                                            <div class="ec-product-inner">
                                                <div class="ec-pro-image-outer">
                                                    <div class="ec-pro-image">
                                                        <a href="discription.php?did=<?php echo $frow['Product_id'] ?>" class="image">
                                                            <img class="main-image w-90" src="../assets/images/products/<?php echo $frow['Product_Image1'] ?>" height="300px" alt="Product" />
                                                            <img class="hover-image" src="../assets/images/products/<?php echo $frow['Product_Image2'] ?>" height="300px" alt="Product" />
                                                        </a>
                                                        <span class="percentage"><?php echo $frow['Sale'] ?></span>
                                                        <span class="flags">
                                                            <span class="new"><?php echo $frow['New_Arrival'] ?></span>
                                                        </span>

                                                        <div class="ec-pro-actions">

                                                            <button title="Add To Cart" class="add-to-cart"  type="submit" name="addtocart"><i class="fa-solid fa-cart-shopping" n></i> Add To Cart</button>
                                                            <button class="ec-btn-group wishlist" type="submit" name="add_to_cart" title="Wishlist"><i class="fa-solid fa-heart"></i></button>
                                                            <input type="hidden" name="title" value="<?php echo $frow['Product_Name'] ?>">
                                                            <input type="hidden" name="price" value="<?php echo $frow['New_Price'] ?>">
                                                            <input type="hidden" name="img" value="<?php echo $frow['Product_Image1'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ec-pro-content">
                                                    <h5 class="ec-pro-title"><a href="description.php?did=<?php echo $frow['Product_id'] ?>"><?php echo $frow['Product_Name'] ?></a></h5>
                                                    <div class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </div>

                                                    <span class="ec-price">
                                                        <span class="old-price"><?php echo $frow['Old_Price'] ?></span>
                                                        <span class="new-price">Rs:<?php echo $frow['New_Price'] ?></span>
                                                    </span>

                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                <?php } ?>





                            </div>
                    </div>
                    <!--  3rd Product tab end -->
                    <!-- 4th Product tab start -->
                    <div class="tab-pane fade" id="tab-pro-for-child">
                    <div class="row">
                    <?php
                            $cfetch = "SELECT * FROM `products` WHERE `For` = 'child';";
                            $cresult = mysqli_query($conn, $cfetch);
                            while ($crow = mysqli_fetch_array($cresult)) {



                                ?>
                                    <div class="col-lg-3 col-md-8 col-sm-8 col-xs-8 mb-6 pro-gl-content">
                                        <form action="wishlistdetail.php" method="post">
                                            <div class="ec-product-inner">
                                                <div class="ec-pro-image-outer">
                                                    <div class="ec-pro-image">
                                                        <a href="discription.php?did=<?php echo $crow['Product_id'] ?>" class="image">
                                                            <img class="main-image w-90" src="../assets/images/products/<?php echo $crow['Product_Image1'] ?>" height="300px" alt="Product" />
                                                            <img class="hover-image" src="../assets/images/products/<?php echo $crow['Product_Image2'] ?>" height="300px" alt="Product" />
                                                        </a>
                                                        <span class="percentage"><?php echo $crow['Sale'] ?></span>
                                                        <span class="flags">
                                                            <span class="new"><?php echo $crow['New_Arrival'] ?></span>
                                                        </span>

                                                        <div class="ec-pro-actions">

                                                            <button title="Add To Cart" class="add-to-cart"  type="submit" name="addtocart"><i class="fa-solid fa-cart-shopping" ></i> Add To Cart</button>
                                                            <button class="ec-btn-group wishlist" type="submit" name="add_to_cart" title="Wishlist"><i class="fa-solid fa-heart"></i></button>
                                                            <input type="hidden" name="title" value="<?php echo $crow['Product_Name'] ?>">
                                                            <input type="hidden" name="price" value="<?php echo $crow['New_Price'] ?>">
                                                            <input type="hidden" name="img" value="<?php echo $crow['Product_Image1'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ec-pro-content">
                                                    <h5 class="ec-pro-title"><a href="description.php?did=<?php echo $crow['Product_id'] ?>"><?php echo $crow['Product_Name'] ?></a></h5>
                                                    <div class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </div>

                                                    <span class="ec-price">
                                                        <span class="old-price"><?php echo $crow['Old_Price'] ?></span>
                                                        <span class="new-price">Rs:<?php echo $crow['New_Price'] ?></span>
                                                    </span>

                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                <?php } ?>





                            </div>
                    </div>
                    <!-- ec 4th Product tab end -->
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- ec Product tab Area End -->

    <!-- ec Banner Section Start -->
    <section class="ec-banner section section-space-p">
        <h2 class="d-none">Banner</h2>
        <div class="container">
            <!-- ec Banners Start -->
            <div class="ec-banner-inner">
                <!--ec Banner Start -->
                <div class="ec-banner-block ec-banner-block-2">
                    <div class="row">
                        <div class="banner-block col-lg-6 col-md-12 margin-b-30" data-animation="slideInRight">
                            <div class="bnr-overlay">
                                <img src="assets/images/banner/2.jpg" alt="" />
                                <div class="banner-text">
                                    <span class="ec-banner-stitle">New Arrivals</span>
                                    <span class="ec-banner-title">mens<br> Sport shoes</span>
                                    <span class="ec-banner-discount">30% Discount</span>
                                </div>
                                <div class="banner-content">
                                    <span class="ec-banner-btn"><a href="#">Order Now</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="banner-block col-lg-6 col-md-12" data-animation="slideInLeft">
                            <div class="bnr-overlay">
                                <img src="assets/images/banner/3.jpg" alt="" />
                                <div class="banner-text">
                                    <span class="ec-banner-stitle">New Trending</span>
                                    <span class="ec-banner-title">Smart<br> watches</span>
                                    <span class="ec-banner-discount">Buy any 3 Items & get <br>20% Discount</span>
                                </div>
                                <div class="banner-content">
                                    <span class="ec-banner-btn"><a href="#">Order Now</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ec Banner End -->
                </div>
                <!-- ec Banners End -->
            </div>
        </div>
    </section>
    <!-- ec Banner Section End -->

    <!--  Category Section Start -->
    <section class="section ec-category-section section-space-p" id="categories">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Top Collection</h2>
                        <h2 class="ec-title">New Arrivals</h2>
                        <p class="sub-title">Browse Our New Collection </p>
                    </div>
                </div>
            </div>

            <div class="row">
                    <?php
                            $new = "SELECT * FROM `products` WHERE `New_Arrival` = 'New';";
                            $newresult = mysqli_query($conn, $new);
                            while ($nrow = mysqli_fetch_array($newresult)) {



                                ?>
                                    <div class="col-lg-3 col-md-8 col-sm-8 col-xs-8 mb-6 pro-gl-content">
                                        <form action="wishlistdetail.php" method="post">
                                            <div class="ec-product-inner">
                                                <div class="ec-pro-image-outer">
                                                    <div class="ec-pro-image">
                                                        <a href="discription.php?did=<?php echo $nrow['Product_id'] ?>" class="image">
                                                            <img class="main-image w-90" src="../assets/images/products/<?php echo $nrow['Product_Image1'] ?>" height="300px" alt="Product" />
                                                            <img class="hover-image" src="../assets/images/products/<?php echo $nrow['Product_Image2'] ?>" height="300px" alt="Product" />
                                                        </a>
                                                        <span class="percentage"><?php echo $nrow['Sale'] ?></span>
                                                        <span class="flags">
                                                            <span class="new"><?php echo $nrow['New_Arrival'] ?></span>
                                                        </span>

                                                        <div class="ec-pro-actions">

                                                            <button title="Add To Cart" class="add-to-cart"  type="submit" name="addtocart"><i class="fa-solid fa-cart-shopping" ></i> Add To Cart</button>
                                                            <button class="ec-btn-group wishlist" type="submit" name="add_to_cart" title="Wishlist"><i class="fa-solid fa-heart"></i></button>
                                                            <input type="hidden" name="title" value="<?php echo $nrow['Product_Name'] ?>">
                                                            <input type="hidden" name="price" value="<?php echo $nrow['New_Price'] ?>">
                                                            <input type="hidden" name="img" value="<?php echo $nrow['Product_Image1'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ec-pro-content">
                                                    <h5 class="ec-pro-title"><a href="description.php?did=<?php echo $nrow['Product_id'] ?>"><?php echo $nrow['Product_Name'] ?></a></h5>
                                                    <div class="ec-pro-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star"></i>
                                                    </div>

                                                    <span class="ec-price">
                                                        <span class="old-price"><?php echo $nrow['Old_Price'] ?></span>
                                                        <span class="new-price">Rs:<?php echo $nrow['New_Price'] ?></span>
                                                    </span>

                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                <?php } ?>





                            </div>
                <!-- Category Nav End -->
              

   


    <!-- footer -->
<?php
include 'footer.php';
?>

    

    <!-- Vendor JS -->
    <script src="../assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
    <script src="../assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="../assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="../assets/js/plugins/countdownTimer.min.js"></script>
    <script src="../assets/js/plugins/scrollup.js"></script>
    <script src="../assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="../assets/js/plugins/slick.min.js"></script>
    <script src="../assets/js/plugins/infiniteslidev2.js"></script>
    <script src="../assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="../assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Google translate Js -->
    <script src="../assets/js/vendor/google-translate.js"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
        }
    </script>
    <!-- Main Js -->
    <script src="../assets/js/vendor/index.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>