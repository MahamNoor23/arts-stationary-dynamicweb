<?php
// Connect to your database (modify the database credentials accordingly)


$conn = new mysqli('localhost','root','','arts_stationary');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted and the sorting option is selected
if (isset($_POST['ec-select']) && in_array($_POST['ec-select'], array(3, 4))) {
    $cid = $_POST['ec-select'] === '3' ? 'ASC' : 'DESC'; // Choose sorting order based on selected option

    // Modify your product query with the sorting option
    $sql = "SELECT * FROM `products` as p JOIN `category` as c ON p.CategoryName = c.cid  WHERE c.cid='$cid' ORDER BY p. New_Price $cid";

    // Execute the query and fetch the results
    $result = $conn->query($sql);

    // Display the sorted products
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display your product information here
            echo "Product Name: " . $row["Product_Name"] . "<br>";
            echo "Price: " . $row["New_Price"] . "<br>";
            // Add other product details as needed
            echo "<br>";
        }
    } else {
        echo "No products found.";
    }

    // Close the database connection
    $conn->close();
}
?>
