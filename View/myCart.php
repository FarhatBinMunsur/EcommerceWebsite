<?php
    require_once __DIR__.'/../Model/MyCart.php';
    $cart = $_SESSION['cart']; 
    // var_dump($cart);
    // var_dump($_SESSION);
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    
    </head>
    
    <body>

    <h1 class="topheading">My Cart</h1>

    <div class="main">
            <div class="sidebar">
            <h1>Menu</h1>
            <form action="customerHome.php" method="post">
                <input type="submit" name="Home" value="Home" id="">
            </form>

            <form action="../Controller/cartHandler.php" name="Cart" method="post">
                <input type="submit" name="Cart" value="Cart" id="">
            </form>

            <form action="../View/myOrders.php" method="post">
                <input type="submit" name="orders" value="My orders" id="">
            </form>

            <form action="">
                <input type="submit" value="My Profile" name="Home" id="">
            </form>

            <form action="">
                <input type="submit" value="LogOut" name="Home" id="">
            </form>

        </div>

        <div class="cartTable">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>

            <?php $total=0; foreach($cart as $c){ ?>
            <tr>
                <td><?php echo $c['name']?></td>
                <td><?php echo $c['Quantity']?></td>
                <td><?php echo $c['price']?></td>
                <td><?php echo $c['Quantity']*$c['price']; $total+=$c['Quantity']*$c['price']?></td>
                <td><a href="../Model/MyCart.php?cartID=<?php echo $c['CartID']; ?>">Delete</a></td>
            </tr>

            <?php }?>

            <tr>
            <td colspan="3" >Sub Total: </td>
            <td colspan="2"><?php echo"\t". $total?></td>
            
            </tr>

        </table>

        <br><br>
        <div class="backbtn">
            <form action="customerHome.php">
            <input type="submit" name="back"  id="" value="Back">
        </form>
        <br>
        </div>
        <p style="color:red; font-weight: bold; font-style: italic;">Notice:If you want to decrease the product quantity, please delete the product and add again from Home page !!</p>

    </div>
    </div>

    <br><br>
    <div class="confirmOrder">
        <form action="../Controller/cartHandler.php" method="post">
            <input type="hidden" name="confirm" value="<?php echo $cart[0]['userID']; ?>">    
            
            Delivery Location: <br>
            <textarea name="dl" id=""></textarea>
            <br><br>

            Phone: <br><input type="text" name="phone" class="phone" id="">
            <br><br>

            Payment Type: <br>
            <select name="pmt" class="pmt" id="">
                <option value="Cash On delivery">Cash On delivery</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Mobile Banking">Mobile Banking</option>
            </select>

            <br><br>
            <input type="submit" class="cforder" name="cforder" id="" value="Confirm Order">
        </form>
    </div>
    </body>

</html>