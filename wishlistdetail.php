<?php

session_start();


if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {

        if (isset($_SESSION['cart'])) {
            $items = array_column($_SESSION['cart'], 'title');
            if (in_array($_POST['title'], $items)) {
                echo "
                <script>alert('Item Already Added')
                window.location.href = 'wishlist.php'
                </script>
                
                ";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array(
                    "title" => $_POST['title'],
                    "price" => $_POST['price'],
                    "img" => $_POST['img']

                );
                echo "
            <script>alert('Item Added')
            window.location.href = 'wishlist.php'
            </script>
            ";
            }
        }
    } else {

        $_SESSION['cart'][0] = array(
            "title" => $_POST['title'],
            "price" => $_POST['price'],
            "img" => $_POST['img']
        );
        echo "
                <script>alert('Item Added')
                window.location.href = 'wishlist.php'
                </script>
                
                ";
    }
}

if (isset($_POST['remove'])) {
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item["title"] == $_POST['title']) {

            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "
                <script>alert('Item Removed')
                window.location.href = 'wishlist.php'
                </script>
                
                ";
        }
    }
}

if (isset($_POST['remove_all'])) {
    session_destroy();
    echo "
    <script>alert('All Items Removed')
    window.location.href = 'wishlist.php'
    </script>
    
    ";
}
//addtocart

if (isset($_POST['addtocart'])) {
    if (isset($_SESSION['cart1'])) {

        if (isset($_SESSION['cart1'])) {
            $items = array_column($_SESSION['cart1'], 'title');
            if (in_array($_POST['title'], $items)) {
                echo "
                <script>alert('Item Already Added')
                window.location.href = 'addtocart.php'
                </script>
                
                ";
            } else {
                $count = count($_SESSION['cart1']);
                $_SESSION['cart1'][$count] = array(
                    "title" => $_POST['title'],
                    "price" => $_POST['price'],
                    "img" => $_POST['img'],
                    "id" => $_POST['id'],
                    "quantity" => 1

                );
                echo "
            <script>alert('Item Added')
            window.location.href = 'addtocart.php'
            </script>
            ";
            }
        }
    } else {

        $_SESSION['cart1'][0] = array(
            "title" => $_POST['title'],
            "price" => $_POST['price'],
            "img" => $_POST['img'],
            "id" => $_POST['id'],
            "quantity" => 1
        );
        echo "
                <script>alert('Item Added')
                window.location.href = 'addtocart.php'
                </script>
                
                ";
    }
}

if (isset($_POST['removecart'])) {
    foreach ($_SESSION['cart1'] as $key => $item) {
        if ($item["title"] == $_POST['title']) {

            unset($_SESSION['cart1'][$key]);
            $_SESSION['cart1'] = array_values($_SESSION['cart1']);

            echo "
                <script>alert('Item Removed')
                window.location.href = 'addtocart.php'
                </script>
                
                ";
        }
    }
}

if (isset($_POST['removeall'])) {
    session_destroy();
    echo "
    <script>alert('All Items Removed')
    window.location.href = 'addtocart.php'
    </script>
    ";
}
