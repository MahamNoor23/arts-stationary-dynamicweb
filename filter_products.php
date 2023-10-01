<?php
include 'header.php';

$minPrice = isset($_GET['min_price']) ? $_GET['min_price'] : 0;
$maxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : PHP_INT_MAX;
    $cid = $_GET['cid'];

$minPrice = intval($minPrice);
$maxPrice = intval($maxPrice);

$sql = "SELECT * FROM `products` as p JOIN `category`as c ON p.CategoryName = c.cid  WHERE c.cid='$cid' AND New_Price >= $minPrice AND New_Price <= $maxPrice";
$result = $conn->query($sql);
echo'<div class="col-md-6 ec-sort-select">
<span class="sort-by">Sort by</span>
<div class="ec-select-inner">
    <select name="ec-select" id="ec-select">
        <option selected disabled>Position</option>

        <option value="1">Product Name:A to Z</option>
        <option value="2">Product Name:Z to A</option>
        <option value="3">Price:low to high</option>
        <option value="4">Price:high to low</option>
    </select>
</div>
</div>
</div>';
echo'<div class="shop-pro-content">
<div class="shop-pro-inner"> 
<div class="row">'
;

// Display the filtered products
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-lg-3 col-md-8 col-sm-8 col-xs-8 mb-6 pro-gl-content mt-5">';
    
        echo '<div class="ec-product-inner">';
        echo '<div class="ec-pro-image-outer">';
        echo '<div class="ec-pro-image">';
        echo '<a href="description.php?did=' . $row['Product_id'] . '" class="image">';
        echo '<img class="main-image w-90" src="../assets/images/products/' . $row['Product_Image1'] . '" height="300px" alt="Product" />';
        echo '<img class="hover-image" src="../assets/images/products/' . $row['Product_Image2'] . '" height="300px" alt="Product" />';
        echo '</a>';
        echo '<span class="percentage">' . $row['Sale'] . '</span>';
        echo '<span class="flags">';
        echo '<span class="new">' . $row['New_Arrival'] . '</span>';
        echo '</span>';
        echo '<div class="ec-pro-actions">';
        echo '<button class="ec-btn-group add-to-cart" type="submit" name="addtocart" title=" Cart"><i class="fa-solid fa-cart-shopping"></i> Add To Cart</button>';
        echo '<button class="ec-btn-group wishlist" type="submit" name="add_to_cart" title="Wishlist"><i class="fa-solid fa-heart"></i></button>';
        echo '<input type="hidden" name="title" value="' . $row['Product_Name'] . '">';
        echo '<input type="hidden" name="price" value="' . $row['New_Price'] . '">';
        echo '<input type="hidden" name="img" value="' . $row['Product_Image1'] . '">';
        echo '<input type="hidden" name="id" value="' . $row['Product_id'] . '">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="ec-pro-content">';
        echo '<h5 class="ec-pro-title"><a href="description.php?did=' . $row['Product_id'] . '">' . $row['Product_Name'] . '</a></h5>';
        echo '<div class="ec-pro-rating">';
        echo '<i class="fa-solid fa-star"></i>';
        echo '<i class="fa-solid fa-star"></i>';
        echo '<i class="fa-solid fa-star"></i>';
        echo '<i class="fa-solid fa-star-half-stroke"></i>';
        echo '<i class="fa-regular fa-star"></i>';
        echo '</div>';
        echo '<span class="ec-price">';
        echo '<span class="old-price">Rs:' . $row['Old_Price'] . '</span>';
        echo '<span class="new-price">Rs:' . $row['New_Price'] . '</span>';
        echo '</span>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      
    }
} else {
    echo "No products found within the specified price range.";
}
echo'</div>
</div>
</div> ';


// Close the database connection
$conn->close();
?>

<?php
include 'footer.php'
?>


