<?php
// session_start();
require_once __DIR__ ."/../Controller/manageProductHandler.php";
// var_dump($catagory);

// var_dump($product);

// $_SESSION['userID'] = 2;

var_dump($_FILES);


?>
<html>

<head>
    <title>Buy Product</title>
     <link rel="stylesheet" href="../View/style.css">       <!--//View thke ber hoiye abar view tei dhuko  -->
</head>

<body>

    <h1 class="topheading">ShopEaseee</h1>

    <div class="main">
        <div class="sidebar">
            <h1>Menu</h1>
            <form action="managerHome.php" method="post">
                <input type="submit" name="Home" value="Home" id="">
            </form>

            <form action="../View/managerOrderView.php" name="Cart" method="post">
                <input type="submit" name="Orders" value="Manage Orders" id="">
            </form>

            <form action="" method="post">
                <input type="submit" name="orders" value="Product Operation" id="">
            </form>

            <form action="../View/viewProfile.php" method="post">
                <input type="submit" value="My Profile" name="Home" id="">
            </form>

            <form action="">
                <input type="submit" value="LogOut" name="Home" id="">
            </form>

        </div>

        <div>
            <form action="../Controller/manageProductHandler.php" method="post"  enctype="multipart/form-data">

            Product Name: <input type="text" name="pname" <?php if(isset($product)) echo "readonly"?> value="<?php if(isset($product)) echo $product['name'] ;?>"><br><br>
            Select Catagory: <select name="ctg" id="">
            <?php for($i=0;$i<count($catagory);$i++){?>
                <option value="<?php echo $catagory[$i]?>" ><?php echo $catagory[$i] ?></option>
            <?php }?>

            </select>
            <br><br>
            Product Price: <input type="text" name="pprice" value="<?php if(isset($product)) echo $product['price'] ;?>"><br><br>
            Product Stock: <input type="text" name="stock" value="<?php if(isset($product)) echo $product['stock'] ;?>"><br><br>
            Product Details: <input type="text" name="details" value="<?php if(isset($product)) echo $product['details']?>"><br><br>
            Product Image: <input type="file" name="image" id=""><br><br>

            <input type="submit" value="Save Product" name="" id="">
            </form>

            <?php
            if(isset($$successmsg)) {
            echo "Added Successfully";
            }
            ?>

        <br><br>

        <h2>Available Products:</h2>

        <div class="table">
            <table>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Catagory</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Details</th>
                    <th>Action</th>
                </tr>

                <?php foreach($products as $p){?>
                <tr onclick="selectProduct(<?php echo $p['productID']?>)">
                    
                    <td><?php echo $p['productID']?></td>
                    <td><?php echo $p['name']?></td>
                    <td><?php echo $p['catagory']?></td>
                    <td><?php echo $p['price']?></td>
                    <td><?php echo $p['stock']?></td>
                    <td><?php echo $p['details']?></td>

                    <td>
                        
                        <a href="../Controller/manageProductHandler.php?productID=<?php echo $p['productID']?>&action=<?php echo'delete'?>">Delete</a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
        </div>
        
    </div>

    <script>
        function selectProduct(productID){
            window.location.href="../Controller/manageProductHandler.php?action=edit&productID="+productID;
        }
    </script>

</body>

</html>