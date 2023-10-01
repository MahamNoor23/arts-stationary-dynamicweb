<?php
session_start();

include "header.php";

?>


<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Your Cart</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class=""><i class="fa-solid fa-house"></i><a href="index.php">Home</a></li>
                            <li class=""><i class="fa-solid fa-greater-than"></i>Your Cart</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Ec cart page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                <!-- cart content Start -->
                <div class="ec-cart-content">
                    <div class="ec-cart-inner">
                        <div class="row">
                            <form action="#">
                                <div class="table-content cart-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Item No</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            if (isset($_SESSION['cart1'])) {
                                                $_SESSION['count1'] = count($_SESSION['cart1']);
                                                foreach ($_SESSION['cart1'] as $key => $value) {
                                                    // Assuming you have a quantity input for each product in the cart
                                                    $quantity = isset($_POST['quantity_' . $key]) ? (int)$_POST['quantity_' . $key] : 1; // Get the quantity for the current product

                                                    // Calculate sub-total for the current product
                                                    $subTotal = $quantity * (int)$value['price'];

                                                    // Add the sub-total to the total
                                                    $total += $subTotal;
                                            ?>
                                                    <tr>
                                                        <td class="align-middle"><?php echo $key + 1 ?></td>
                                                        <td data-label="Product" class="ec-cart-pro-name">
                                                            <a href="product-left-sidebar.html">
                                                                <img class="main-image w-90" src="../assets/images/products/<?php echo $value['img'] ?>" height="100px" alt="Product" />
                                                                <?php echo $value['title'] ?>
                                                            </a>
                                                        </td>
                                                        <td data-label="Price" class="ec-cart-pro-price"><span class="amount">Rs:<?php echo $value['price'] ?></span></td>
                                                        <td data-label="Quantity" class="ec-cart-pro-qty" style="text-align: center;">
                                                            <div >
                                                                <!-- Assuming you have a quantity input for each product -->
                                                                <input  type="number" min="1" name="quantity_<?php echo $key ?>" value="<?php echo $quantity ?>" onchange="updateSubTotal(<?php echo $key ?>, <?php echo $value['price'] ?>)" />
                                                            </div>
                                                        </td>
                                                        <td data-label="Total" class="ec-cart-pro-subtotal" id="subTotal_<?php echo $key ?>">Rs:<?php echo $subTotal ?></td>

                                                        <td class="align-middle">
                                                            <form action="wishlistdetail.php" method="post">
                                                                <button class='btn btn-sm btn-danger' type="submit" name='removecart'>Remove</button>
                                                                <input type="hidden" name="title" value='<?php echo $value['title'] ?>'>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ec-cart-update-bottom">
                                            <a href="">Continue Shopping</a>
                                            <button class="btn btn-primary"><a href="login.php">Check Out</a></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--cart content End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="ec-cart-rightside col-lg-4 col-md-12">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Summary</h3>
                        </div>

                        <div class="ec-sb-block-content">
                            <div class="ec-cart-summary-bottom">
                                <div class="ec-cart-summary">
                                <?php
// Calculate cart value
$total = 0;
foreach ($_SESSION['cart1'] as $key => $value) {
    $quantity = isset($_POST['quantity_' . $key]) ? (int)$_POST['quantity_' . $key] : 1; // Get the quantity for the current product
    $subTotal = $quantity * (int)$value['price'];
    $total += $subTotal;
    $deliveryCharges = 100; 
$totalAmount = $total  + $deliveryCharges;
}

// Calculate total amount

?>

<div>
    <span class="text-left">Sub-Total</span>
    <span class="text-right" id="summarySubTotal">Rs:<?php echo $total; ?></span>
</div>
<div>
    <span class="text-left">Delivery Charges</span>
    <span class="text-right">Rs:<?php echo $deliveryCharges; ?></span>
</div>
<div>
    <span class="text-left">Coupon Discount</span>
    <span class="text-right"><a class="ec-cart-coupan">Apply Coupon</a></span>
</div>
<div class="ec-cart-coupan-content">
    <form class="ec-cart-coupan-form" name="ec-cart-coupan-form" method="post" action="#">
        <input class="ec-coupan" type="text" required="" placeholder="Enter Your Coupon Code" name="ec-coupan" value="">
        <button class="ec-coupan-btn button btn-primary" type="submit" name="subscribe" value="">Apply</button>
    </form>
</div>

<div class="ec-cart-summary-total">
    <span class="text-left">Total Amount</span>
    <span class="text-right" id="summaryTotalAmount">Rs:<?php echo $totalAmount; ?></span>
</div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Summary Block -->
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    function updateSubTotal(key, price) {
        const quantity = parseInt(document.getElementsByName("quantity_" + key)[0].value);
        const subTotalElement = document.getElementById(`subTotal_${key}`);
        const subTotal = quantity * price;
        subTotalElement.textContent = `Rs:${subTotal}`;
        updateSummaryTotal();
    }

    function updateSummaryTotal() {
        let total = 0;
        const subTotalElements = document.querySelectorAll('[id^="subTotal_"]');
        subTotalElements.forEach(element => {
            total += parseInt(element.textContent.replace("Rs:", ""));
        });
        const deliveryCharges = 100; // Update this as per your requirement
        const totalAmount = total + deliveryCharges;
        document.getElementById("summarySubTotal").textContent = `Rs:${total}`;
        document.getElementById("summaryTotalAmount").textContent = `Rs:${totalAmount}`;
    }
</script>

    <!-- Footer Start -->
   <?php
    include 'footer.php';
    ?>
    <!-- Footer Area End -->

    

  

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