<?php
include 'header.php'
?>


<style>
  .prodDesc{
    max-width: 250px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
</style>
<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Single Products</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="ec-breadcrumb-item active">Products</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Sart Single product -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <?php
            $did = $_GET['did'];
            $popular = "SELECT * FROM `products` as p JOIN `category`as c ON p.CategoryName = c.cid WHERE Product_id=$did  ";

            $resultpopular = mysqli_query($conn, $popular);

            while ($pprow = mysqli_fetch_array($resultpopular)) {


            ?>
                <div class="ec-pro-rightside ec-common-rightside col-lg-9 order-lg-last col-md-12 order-md-first">

                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">
                                <div class="single-pro-img">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="../assets/images/products/<?php echo $pprow['Product_Image1'] ?>" height="400px" alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="../assets/images/products/<?php echo $pprow['Product_Image2'] ?>" height="400px" alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="../assets/images/products/<?php echo $pprow['Product_Image3'] ?>" height="400px" alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="../assets/images/products/<?php echo $pprow['Product_Image4'] ?>" height="400px" alt="">
                                            </div>

                                        </div>
                                        <div class="single-nav-thumb">
                                            <div class="single-slide">
                                                <img class="img-responsive" src="../assets/images/products/<?php echo $pprow['Product_Image1'] ?>" height="70px" alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="../assets/images/products/<?php echo $pprow['Product_Image2'] ?>" height="70px" alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="../assets/images/products/<?php echo $pprow['Product_Image3'] ?>" height="70px" alt="">
                                            </div>
                                            <div class="single-slide">
                                                <img class="img-responsive" src="../assets/images/products/<?php echo $pprow['Product_Image4'] ?>" height="70px" alt="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc">
                                    <div class="single-pro-content">
                                        <h5 class="ec-single-title  text-upper"><?php echo $pprow['Product_Name'] ?></h5>
                                        <div class="ec-single-rating-wrap">
                                           

                                        </div>
                                        <div class="ec-single-desc prodDesc"><?php echo $pprow['Product_Description'] ?></div>
                                        <p>Vendor:<?php echo $pprow['Vendor'] ?></p>
                                        <p>Productcode:<b><?php echo $pprow['Product_Code'] ?></b></p>
                                        <p>Availibility:<?php echo $pprow['Availibility'] ?></p>

                                        <div class="ec-single-price-stoke">
                                            <div class="ec-single-price">

                                                <span class="new-price">Rs:<?php echo $pprow['New_Price'] ?></span>
                                            </div>

                                        </div>


                                        <form action="wishlistdetail.php" method="post">
                                        <div class="ec-single-qty">
                                                <div class="qty-plus-minus">
                                                    <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                                </div>
                                                <div class="ec-single-cart ">
                                                    <button class="btn btn-primary" type="submit" name="addtocart">Add To Cart</button>
                                                </div>
                                                <div class="ec-single-wishlist">
                                                    <button class="ec-btn-group wishlist" type="submit" name="add_to_cart" title="Wishlist"><i class="fa-solid fa-heart"></i></button>

                                                    <input type="hidden" name="title" value="<?php echo $pprow['Product_Name'] ?>">
                                                    <input type="hidden" name="price" value="<?php echo $pprow['New_Price'] ?>">
                                                    <input type="hidden" name="img" value="<?php echo $pprow['Product_Image1'] ?>">
                                                    <input type="hidden" name="id" value="<?php echo $pprow['Product_id'] ?>">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->
                    <!-- Single product tab start -->
                    <div class="ec-single-pro-tab">
                        <div class="ec-single-pro-tab-wrapper">
                            <div class="ec-single-pro-tab-nav">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                                    </li>

                                   
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info" role="tablist">Shipping & Return</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content  ec-single-pro-tab-content">
                                <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                    <div class="ec-single-pro-tab-desc">
                                        <p><?php echo $pprow['Product_Description'] ?>
                                        </p>

                                    </div>
                                </div>

                                <div id="ec-spt-nav-info" class="tab-pane fade">

                                    <div class="ec-single-pro-tab-moreinfo">
                                        <h4>Shipping</h4>
                                        <p>We can ship to virtually any address in the world. Note that there are restrictions on some products, and some products cannot be shipped to international destinations.

                                        </p>
                                        <p>When you place an order, we will estimate shipping and delivery dates for you based on the availability of your items and the shipping options you choose. Depending on the shipping provider you choose, shipping date estimates may appear on the shipping quotes page.</p>
                                        <p>Please also note that the shipping rates for many items we sell are weight-based. The weight of any such item can be found on its detail page. To reflect the policies of the shipping companies we use, all weights will be rounded up to the next full pound.

                                        </p>
                                        <h4>Return</h4>
                                        <p>You may return most new, unopened items within 30 days of delivery for a full refund. We'll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.).</p>
                                        <p>You should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).</p>
                                        <p>If you need to return an item, simply login to your account, view the order using the "Complete Orders" link under the My Account menu and click the Return Item(s) button. We'll notify you via e-mail of your refund once we've received and processed the returned item.</p>
                                    </div>

                                </div>

                                <div id="ec-spt-nav-review" class="tab-pane fade">
                                    <div class="row">
                                        <div class="ec-t-review-wrapper">
                                            <div class="ec-t-review-item">
                                                <div class="ec-t-review-avtar">
                                                    <img src="../assets/images/review-image/1.jpg" alt="" />
                                                </div>
                                                <div class="ec-t-review-content">
                                                    <div class="ec-t-review-top">
                                                        <div class="ec-t-review-name">Jeny Doe</div>
                                                        <div class="ec-t-review-rating">
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ec-t-review-bottom">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-t-review-item">
                                                <div class="ec-t-review-avtar">
                                                    <img src="../assets/images/review-image/2.jpg" alt="" />
                                                </div>
                                                <div class="ec-t-review-content">
                                                    <div class="ec-t-review-top">
                                                        <div class="ec-t-review-name">Linda Morgus</div>
                                                        <div class="ec-t-review-rating">
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ec-t-review-bottom">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="ec-ratting-content">
                                            <h3>Add a Review</h3>
                                            <div class="ec-ratting-form">
                                                <form action="#">
                                                    <div class="ec-ratting-star">
                                                        <span>Your rating:</span>
                                                        <div class="ec-t-review-rating">
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star fill"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                            <i class="ecicon eci-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ec-ratting-input">
                                                        <input name="your-name" placeholder="Name" type="text" />
                                                    </div>
                                                    <div class="ec-ratting-input">
                                                        <input name="your-email" placeholder="Email*" type="email" required />
                                                    </div>
                                                    <div class="ec-ratting-input form-submit">
                                                        <textarea name="your-commemt" placeholder="Enter Your Comment"></textarea>
                                                        <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- product details description area end -->
                </div>
            <?php } ?>
            <!-- Sidebar Area Start -->
            <div class="ec-pro-leftside ec-common-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Category Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h2 class="ec-sidebar-title">Category</h2>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>
                                <li>
                                    <?php
                                    $pacategory = "SELECT * FROM `Parent_Category` WHERE Parent_id=1";
                                    $resultpacategory = mysqli_query($conn, $pacategory);

                                    while ($prow = mysqli_fetch_array($resultpacategory)) {

                                    ?>
                                <li class="menu_title"> <a href="?p_cid=<?php echo $prow['Parent_id'] ?>"> <?php echo $prow['Parent_Name'] ?></a></li> <?php } ?>
                            <ul style="display: block;">
                                <?php


                                $category = "SELECT *, count(c.cid) as product_count FROM  `category` as c JOIN `Parent_Category`as pc ON c.ParentCategory = pc.Parent_id join `products` as p on p.Categoryname=c.cid WHERE c.ParentCategory= 1 group by c.cid  ";

                                $resultcategory = mysqli_query($conn, $category);

                                while ($crow = mysqli_fetch_array($resultcategory)) {


                                ?>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a href="#"><a href="productcards.php?cid=<?php echo $crow['cid'] ?>"><?php echo $crow['Category_Name'] ?><span>-<?php echo $crow['product_count'] ?></span></a>
                                        </div>
                                    </li>

                                <?php } ?>


                            </ul>
                            </li>
                            </ul>
                        </div>


                        <div class="ec-sb-block-content">
                            <ul>
                                <li>
                                    <?php
                                    $pacategory = "SELECT * FROM `Parent_Category` WHERE Parent_id=2";
                                    $resultpacategory = mysqli_query($conn, $pacategory);

                                    while ($prow = mysqli_fetch_array($resultpacategory)) {

                                    ?>
                                <li class="menu_title"> <a href="?p_cid=<?php echo $prow['Parent_id'] ?>"> <?php echo $prow['Parent_Name'] ?></a></li> <?php } ?>
                            <ul style="display: block;">
                                <li>
                                    <?php


                                    $category = "SELECT *, count(c.cid) as product_count FROM  `category` as c JOIN `Parent_Category`as pc ON c.ParentCategory = pc.Parent_id join `products` as p on p.Categoryname=c.cid WHERE c.ParentCategory= 2 group by c.cid  ";

                                    $resultcategory = mysqli_query($conn, $category);

                                    while ($crow = mysqli_fetch_array($resultcategory)) {


                                    ?>
                                <li>
                                    <div class="ec-sidebar-sub-item"><a href="#"><a href="productcards.php?cid=<?php echo $crow['cid'] ?>"><?php echo $crow['Category_Name'] ?><span>-<?php echo $crow['product_count'] ?></span></a>
                                    </div>
                                </li>

                            <?php } ?>


                            </ul>
                            </li>
                            </ul>
                        </div>


                        <div class="ec-sb-block-content">
                            <ul>

                                <li>
                                    <?php
                                    $pacategory = "SELECT * FROM `Parent_Category` WHERE Parent_id=3";
                                    $resultpacategory = mysqli_query($conn, $pacategory);

                                    while ($prow = mysqli_fetch_array($resultpacategory)) {

                                    ?>
                                <li class="menu_title"> <a href="?p_cid=<?php echo $prow['Parent_id'] ?>"> <?php echo $prow['Parent_Name'] ?></a></li> <?php } ?>
                            <ul style="display: block;">
                                <li>
                                    <?php


                                    $category = "SELECT *, count(c.cid) as product_count FROM  `category` as c JOIN `Parent_Category`as pc ON c.ParentCategory = pc.Parent_id join `products` as p on p.Categoryname=c.cid WHERE c.ParentCategory= 3 group by c.cid  ";

                                    $resultcategory = mysqli_query($conn, $category);

                                    while ($crow = mysqli_fetch_array($resultcategory)) {


                                    ?>
                                <li>
                                    <div class="ec-sidebar-sub-item"><a href="#"><a href="productcards.php?cid=<?php echo $crow['cid'] ?>"><?php echo $crow['Category_Name'] ?><span>-<?php echo $crow['product_count'] ?></span></a>
                                    </div>
                                </li>

                            <?php } ?>


                            </ul>
                            </li>
                            </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>
                                <ul>
                                    <li>
                                        <?php
                                        $pacategory = "SELECT * FROM `Parent_Category` WHERE Parent_id=4";
                                        $resultpacategory = mysqli_query($conn, $pacategory);

                                        while ($prow = mysqli_fetch_array($resultpacategory)) {

                                        ?>
                                    <li class="menu_title"> <a href="?p_cid=<?php echo $prow['Parent_id'] ?>"> <?php echo $prow['Parent_Name'] ?></a></li> <?php } ?>
                                <ul style="display: block;">
                                    <li>
                                        <?php


                                        $category = "SELECT *, count(c.cid) as product_count FROM  `category` as c JOIN `Parent_Category`as pc ON c.ParentCategory = pc.Parent_id join `products` as p on p.Categoryname=c.cid WHERE c.ParentCategory= 4 group by c.cid  ";

                                        $resultcategory = mysqli_query($conn, $category);

                                        while ($crow = mysqli_fetch_array($resultcategory)) {


                                        ?>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a href="#"><a href="productcards.php?cid=<?php echo $crow['cid'] ?>"><?php echo $crow['Category_Name'] ?><span>-<?php echo $crow['product_count'] ?></span></a>
                                        </div>
                                    </li>

                                <?php } ?>


                                </ul>
                                </li>
                                </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>

                                <li>
                                    <?php
                                    $pacategory = "SELECT * FROM `Parent_Category` WHERE Parent_id=5";
                                    $resultpacategory = mysqli_query($conn, $pacategory);

                                    while ($prow = mysqli_fetch_array($resultpacategory)) {

                                    ?>
                                <li class="menu_title"> <a href="?p_cid=<?php echo $prow['Parent_id'] ?>"> <?php echo $prow['Parent_Name'] ?></a></li> <?php } ?>
                            <ul style="display: block;">
                                <li>
                                    <?php


                                    $category = "SELECT *, count(c.cid) as product_count FROM  `category` as c JOIN `Parent_Category`as pc ON c.ParentCategory = pc.Parent_id join `products` as p on p.Categoryname=c.cid WHERE c.ParentCategory= 5 group by c.cid  ";

                                    $resultcategory = mysqli_query($conn, $category);

                                    while ($crow = mysqli_fetch_array($resultcategory)) {


                                    ?>
                                <li>
                                    <div class="ec-sidebar-sub-item"><a href="#"><a href="productcards.php?cid=<?php echo $crow['cid'] ?>"><?php echo $crow['Category_Name'] ?><span>-<?php echo $crow['product_count'] ?></span></a>
                                    </div>
                                </li>

                            <?php } ?>


                            </ul>
                            </li>
                            </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>
                                <ul>
                                    <li>
                                        <?php
                                        $pacategory = "SELECT * FROM `Parent_Category` WHERE Parent_id=6";
                                        $resultpacategory = mysqli_query($conn, $pacategory);

                                        while ($prow = mysqli_fetch_array($resultpacategory)) {

                                        ?>
                                    <li class="menu_title"> <a href="?p_cid=<?php echo $prow['Parent_id'] ?>"> <?php echo $prow['Parent_Name'] ?></a></li> <?php } ?>
                                <ul style="display: block;">
                                    <li>
                                        <?php


                                        $category = "SELECT *, count(c.cid) as product_count FROM  `category` as c JOIN `Parent_Category`as pc ON c.ParentCategory = pc.Parent_id join `products` as p on p.Categoryname=c.cid WHERE c.ParentCategory= 6 group by c.cid  ";

                                        $resultcategory = mysqli_query($conn, $category);

                                        while ($crow = mysqli_fetch_array($resultcategory)) {


                                        ?>
                                    <li>
                                        <div class="ec-sidebar-sub-item"><a href="#"><a href="productcards.php?cid=<?php echo $crow['cid'] ?>"><?php echo $crow['Category_Name'] ?><span>-<?php echo $crow['product_count'] ?></span></a>
                                        </div>
                                    </li>

                                <?php } ?>


                                </ul>
                                </li>
                                </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>

                                <li>
                                    <?php
                                    $pacategory = "SELECT * FROM `Parent_Category` WHERE Parent_id=7";
                                    $resultpacategory = mysqli_query($conn, $pacategory);

                                    while ($prow = mysqli_fetch_array($resultpacategory)) {

                                    ?>
                                <li class="menu_title"> <a href="?p_cid=<?php echo $prow['Parent_id'] ?>"> <?php echo $prow['Parent_Name'] ?></a></li> <?php } ?>
                            <ul style="display: block;">
                                <li>
                                    <?php


                                    $category = "SELECT *, count(c.cid) as product_count FROM  `category` as c JOIN `Parent_Category`as pc ON c.ParentCategory = pc.Parent_id join `products` as p on p.Categoryname=c.cid WHERE c.ParentCategory= 7 group by c.cid  ";

                                    $resultcategory = mysqli_query($conn, $category);

                                    while ($crow = mysqli_fetch_array($resultcategory)) {


                                    ?>
                                <li>
                                    <div class="ec-sidebar-sub-item"><a href="#"><a href="productcards.php?cid=<?php echo $crow['cid'] ?>"><?php echo $crow['Category_Name'] ?><span>-<?php echo $crow['product_count'] ?></span></a>
                                    </div>
                                </li>

                            <?php } ?>


                            </ul>
                            </li>
                            </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>

                                <li>
                                    <?php
                                    $pacategory = "SELECT * FROM `Parent_Category` WHERE Parent_id=8";
                                    $resultpacategory = mysqli_query($conn, $pacategory);

                                    while ($prow = mysqli_fetch_array($resultpacategory)) {

                                    ?>
                                <li class="menu_title"> <a href="?p_cid=<?php echo $prow['Parent_id'] ?>"> <?php echo $prow['Parent_Name'] ?></a></li> <?php } ?>
                            <ul style="display: block;">
                                <li>
                                    <?php


                                    $category = "SELECT *, count(c.cid) as product_count FROM  `category` as c JOIN `Parent_Category`as pc ON c.ParentCategory = pc.Parent_id join `products` as p on p.Categoryname=c.cid WHERE c.ParentCategory= 8 group by c.cid  ";

                                    $resultcategory = mysqli_query($conn, $category);

                                    while ($crow = mysqli_fetch_array($resultcategory)) {


                                    ?>
                                <li>
                                    <div class="ec-sidebar-sub-item"><a href="#"><a href="productcards.php?cid=<?php echo $crow['cid'] ?>"><?php echo $crow['Category_Name'] ?><span>-<?php echo $crow['product_count'] ?></span></a>
                                    </div>
                                </li>

                            <?php } ?>


                            </ul>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar Category Block -->
                </div>
                <div class="ec-sidebar-slider">


                    <!-- Sidebar Area Start -->
                </div>
            </div>
</section>
<!-- End Single product -->

<!-- Related Product Start -->
<section class="section ec-releted-product section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Related products</h2>
                    <h2 class="ec-title">Related products</h2>

                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme  mt-5">
            <?php
            $category = "SELECT CategoryName from `products` WHERE Product_id=$did";
            $categoryresult = mysqli_query($conn, $category);
            $cat = mysqli_fetch_assoc($categoryresult);
            $products = "SELECT * FROM `products` as p JOIN `category`as c ON p.CategoryName = c.cid  WHERE p.CategoryName= " . $cat['CategoryName'];

            $resultproducts = mysqli_query($conn, $products);

            while ($prow = mysqli_fetch_array($resultproducts)) {


            ?>
                <div class="item">


                    <a href="discription.php?did=<?php echo $prow['Product_id'] ?>" class="image">
                        <img class="main-image w-90" src="../assets/images/products/<?php echo $prow['Product_Image1'] ?>" height="250px" alt="Product" />

                    </a>
                    <p><b><a href="description.php?did=<?php echo $prow['Product_id'] ?>"><?php echo $prow['Product_Name'] ?></a></p></b>
                </div>




            <?php } ?>
        </div>

    </div>
</section>


<?php
include 'footer.php'
?>
<!-- owl -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: true
            },
            1000: {
                items: 5,
                nav: true,
                loop: true
            }
        }
    })
</script>


<!-- Footer navigation panel for responsive display -->
<div class="ec-nav-toolbar">
    <div class="container">
        <div class="ec-nav-panel">
            <div class="ec-nav-panel-icons">
                <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><i class="fi-rr-menu-burger"></i></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><i class="fi-rr-shopping-bag"></i><span class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="index.html" class="ec-header-btn"><i class="fi-rr-home"></i></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="wishlist.html" class="ec-header-btn"><i class="fi-rr-heart"></i><span class="ec-cart-noti">4</span></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="login.html" class="ec-header-btn"><i class="fi-rr-user"></i></a>
            </div>

        </div>
    </div>
</div>
<!-- Footer navigation panel for responsive display end -->



<!-- Cart Floating Button -->
<div class="ec-cart-float">
    <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
        <div class="header-icon"><i class="fi-rr-shopping-basket"></i>
        </div>
        <span class="ec-cart-count cart-count-lable">3</span>
    </a>
</div>
<!-- Cart Floating Button end -->






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
<!-- Google translate Js -->
<script src="../assets/js/vendor/google-translate.js"></script>
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