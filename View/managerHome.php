<?php
session_start();

// var_dump($products);
$_SESSION['userID'] = 2;
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

            <form action="../View/managerOrderView.php" name="Cart" method="post">
                <input type="submit" name="Orders" value="Manage Orders" id="">
            </form>

            <form action="../View/manageProduct.php" method="post">
                <input type="submit" name="orders" value="Product Operation" id="">
            </form>

            <form action="">
                <input type="submit" value="My Profile" name="Home" id="">
            </form>

            <form action="">
                <input type="submit" value="LogOut" name="Home" id="">
            </form>

        </div>

        
    </div>

</body>

</html>