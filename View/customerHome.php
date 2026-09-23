<?php
session_start();
require_once __DIR__ . '/../Model/viewallproduct.php';
$products = showProduct();
// var_dump($products);
// echo $_SESSION['userID'] ;
?>
<html>

<head>
    <title>Buy Product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1 class="topheading">ShopEaseee</h1>

    <div class="main">
        <div class="sidebar">
            <h1>Menu</h1>
            <form action="" method="post">
                <input type="submit" name="Home" value="Home" id="">
            </form>

            <form action="../Controller/cartHandler.php" name="Cart" method="post">
                <input type="submit" name="Cart" value="Cart" id="">
            </form>

            <form action="../View/myOrders.php" method="post">
                <input type="submit" name="orders" value="My orders" id="">
            </form>

            <form action="../View/viewProfile.php" method="post">
                <input type="submit" value="My Profile" name="Home" id="">
            </form>

            <form action="../Controller/logoutHandler.php">
                <input type="submit" value="LogOut" name="Home" id="">
            </form>

        </div>

        <div class="product">
                
        <input type="search" name="" id="">
            <?php foreach ($products as $p) { ?>
                <div name="productCard" class="productCard">
                    <img src="<?php echo $p['image']?>" alt="image not available">
                    
                    <div class="productInfo">
                    <p class="productName"><?php echo $p['name']; ?></p>
                    <p class="productPrice"><?php echo $p['price'] . " taka"; ?></p>
                    </div>
                    <form action="../Controller/homepageHandler.php" name="addtocart" method="POST">
                        <input type="hidden" name="action" value="addtocart">
                        <input type="hidden" name="productID" value="<?php echo $p['productID']; ?>">
                        <input type="number" name="quantity" value="1" min="1" max="<?php echo $p['stock']; ?>">
                        <input type="submit" name="" id="" value="add to cart">
                    </form>
                </div>
                
            <?php } ?>

        </div>
    </div>

</body>

</html>