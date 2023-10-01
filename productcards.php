<?php
include 'header.php'; 
// ...
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    // Default sorting order
    $sortOrder = 'ASC';

    // Check if a sorting option is selected from the URL query parameter
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
        if ($sort === 'desc') {
            $sortOrder = 'DESC';
        }
    }

    // Modify your product query with the sorting option
    $products1 = "SELECT * FROM `products` as p JOIN `category`as c ON p.CategoryName = c.cid  WHERE c.cid='$cid' ORDER BY p.New_Price $sortOrder";
    $resultproducts1 = mysqli_query($conn, $products1);
} elseif (isset($_GET['search'])) {
    // Similarly, handle the search query and sorting if needed
    // ...
}


?>

<!-- ekka Cart End -->

<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <h2 class="ec-breadcrumb-title">Category Name</h2>

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="ec-breadcrumb-item active">Shop</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec Shop page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                    <!-- Shop Top Start -->
                    <div class="ec-pro-list-top d-flex">
                        <div class="col-md-6 ec-grid-list">
                            <div class="ec-gl-btn">
                                <button class="btn btn-grid active"><i class="fa-regular fa-table-cells-large"></i></button>
                                <button class="btn btn-list"><i class="fa-solid fa-bars"></i></button>
                            </div>
                        </div>
                        <div class="col-md-6 ec-sort-select">
                            <span class="sort-by">Sort by</span>
                            <div class="ec-select-inner">
    <form method="post" action="">

        <!-- Add JavaScript event handler for form submission -->
        <select name="ec-select" id="ec-select" onchange="sortProducts(this.value)">
            <option selected disabled>Position</option>
            <option value="asc">Price: low to high</option>
            <option value="desc">Price: high to low</option>
        </select>

    </form>
</div>



                        </div>
                    </div>
                    <!-- Shop Top End -->

                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="shop-pro-inner">
                            <div class="row">
                                <?php
                                if (isset($_GET['cid'])) {
                                    $cid = $_GET['cid'];
                                    $products = "SELECT * FROM `products` as p JOIN `category`as c ON p.CategoryName = c.cid  WHERE c.cid='$cid' ";
                                 
                                } elseif (isset($_GET['search'])) {

                                    $search = $_GET['search'];
                                    $products = "SELECT * FROM `products` as p JOIN `category`as c ON p.CategoryName = c.cid  WHERE c.Category_Name LIKE  '%$search%' ";
                                  
                                }

                                $resultproducts = mysqli_query($conn, $products);

                                while ($prow = mysqli_fetch_array($resultproducts)) {



                                ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
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
                        <!-- Pagination Start -->
                        <nav aria-label="...">
                           
                    </div>
                </div>

                </nav>
                <!-- Pagination End -->

                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                    <div id="shop_sidebar">
                        <h4>Price Range</h4>
                        <div class="list-group">
                            <form action="filter_products.php" method="GET">
                                <input type="hidden" name="cid" value="<?php echo $cid ?>">
                                <label for="min_price">Minimum Price:</label>
                                <input type="number" name="min_price" id="min_price">
                                <label for="max_price">Maximum Price:</label>
                                <input type="number" name="max_price" id="max_price">
                                <input class="mt-3" type="submit" value="Filter">


                            </form>
                        </div>


                    </div>


                </div>
            </div>
        </div>
</div>
</section>
<!-- End Shop page -->

<?php
include 'footer.php'
?>



<!-- feedback  -->

<div class="recent-purchase">

    <img src="../assets/images/feedback/feedback.jpg" alt="">

    <div class="detail">

        <a href="feedback.php">
            <h6 class="mt-5"><b> Send us your Feedback</b></h6>
        </a>

    </div>

    <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
</div>







<!-- Vendor JS -->
<script src="../assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="../assets/js/vendor/popper.min.js"></script>
<script src="../assets/js/vendor/bootstrap.min.js"></script>
<script src="../assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="../assets/js/vendor/modernizr-3.11.2.min.js"></script>

<!--Plugins JS-->
<script src="../assets/js/plugins/swiper-bundle.min.js"></script>
<script src="../assets/js/plugins/countdownTimer.min.js"></script>
<script src="../assets/js/plugins/scrollup.js"></script>
<script src="../assets/js/plugins/jquery.zoom.min.js"></script>
<script src="../assets/js/plugins/slick.min.js"></script>
<script src="../assets/js/plugins/infiniteslidev2.js"></script>
<script src="../assets/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="../assets/js/plugins/jquery.sticky-sidebar.js"></script>
<script src="../assets/js/plugins/nouislider.js"></script>
<!-- Google translate Js -->
<script src="assets/js/vendor/google-translate.js"></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>
<!-- Main Js -->
<script src="../assets/js/vendor/index.js"></script>
<script src="../assets/js/main.js"></script>

</body>

</html>